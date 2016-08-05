<?php

namespace CodeExplorerBundle\Twig;

class SourceCodeExtension extends \Twig_Extension
{
    private $controller;
    private $kernelRootDir;

    public function __construct($kernelRootDir)
    {
        $this->kernelRootDir = $kernelRootDir;
    }

    public function setController($controller)
    {
        $this->controller = $controller;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'show_source_code',
                array($this, 'showSourceCode'),
                array('is_safe' => array('html'), 'needs_environment' => true)),
        );
    }

    public function showSourceCode(\Twig_Environment $twig, $template)
    {
        return $twig->render('@CodeExplorer/source_code.html.twig', array(
            'controller' => $this->getController(),
            'template' => $this->getTemplateSource($twig->resolveTemplate($template)),
        ));
    }

    private function getController()
    {
        if (null === $this->controller) {
            return;
        }

        $method = $this->getCallableReflector($this->controller);

        $classCode = file($method->getFileName());
        $methodCode = array_slice(
            $classCode,
            $method->getStartLine() - 1,
            $method->getEndLine() - $method->getStartLine() + 1);
        $controllerCode = '    '.$method->getDocComment()."\n".implode('', $methodCode);

        return array(
            'file_path' => $method->getFileName(),
            'starting_line' => $method->getStartLine(),
            'source_code' => $this->unindentCode($controllerCode),
        );
    }

    private function getCallableReflector($callable)
    {
        if (is_array($callable)) {
            return new \ReflectionMethod($callable[0], $callable[1]);
        }

        if (is_object($callable) && !$callable instanceof \Closure) {
            $r = new \ReflectionObject($callable);
            return $r->getMethod('__invoke');
        }

        return new \ReflectionFunction($callable);
    }

    private function getTemplateSource(\Twig_Template $template)
    {
        return array(
            'file_path' => $this->kernelRootDir.'/Resources/views/'.$template->getTemplateName(),
            'starting_line' => 1,
            'source_code' => $template->getSource(),
        );
    }

    private function unindentCode($code)
    {
        $formattedCode = $code;
        $codeLines = explode("\n", $code);

        $indentLines = array_filter($codeLines, function($lineOfCode) {
            return '' === $lineOfCode || '    ' === substr($lineOfCode, 0, 4);
        });

        if (count($indentLines) === count($codeLines)) {
            $formattedCode = array_map(function($lineOfCode) {
                return substr($lineOfCode, 4);
            }, $codeLines);

            $formattedCode = implode("\n", $formattedCode);
        }

        return $formattedCode;
    }

    public function getName()
    {
        return 'code_explorer_source_code';
    }
}

