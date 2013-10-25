#!/bin/bash

cd `dirname $0`

php vendor/crodas/simple-view-engine/cli.php compile -N crodas\\Form  $(pwd)/lib/crodas/Form/Template $(pwd)/lib/crodas/Form/Templates.php
