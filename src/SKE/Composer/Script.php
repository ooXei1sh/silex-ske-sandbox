<?php

namespace SKE\Composer;

class Script
{
    public static function install()
    {
        $dirs = array(
            'resources/cache',
            'resources/log',
        );

        foreach($dirs as $dir) {
            if (!file_exists($dir))
                mkdir($dir, 0755, true);
            else
                chmod($dir, 0755);
        }

        $console = 'console';

        $code = <<<HEREDOC
#!/usr/bin/env php
<?php

require_once __DIR__.'/vendor/autoload.php';

\$app = new Silex\Application();

\$app['environment'] = 'dev';
require __DIR__.'/src/app.php';

\$console = require __DIR__.'/src/console.php';
\$console->run();
HEREDOC;

        if (!file_exists($console)){
            $fileinfo = new \SplFileInfo($console);
            $f = $fileinfo->openFile('w');
            $f->fwrite($code);
            $fileinfo = null;
            $f= null;
        }

        if (file_exists($console)){
            chmod($console, 0500);
        }
    }
}
