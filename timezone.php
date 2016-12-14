<?php

// at shell run: export TZ=Asia/Singapore
// 1. from date_default_timezone_set
// 2. from TZ enviroment variable
// 3. from ini date.timezone
// 4. from os
echo date_default_timezone_get() . "\n";
