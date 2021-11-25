<?php

namespace Jascha030\ComposerTemplate\Parser;

class XMLParser
{
    private string $path;

    private \SplFileInfo $fileInfo;

    private \XMLReader $reader;

    public function __construct(string $path)
    {
        if (!file_exists($path)) {
            throw new \InvalidArgumentException("Invalid path: \"{$path}\".");
        }

        $this->fileInfo = new \SplFileInfo($path);

        // Todo: recognize if other filetype, which can be handled with compression wrapper
        if ('.xml' !== $this->fileInfo->getExtension()) {
            throw new \InvalidArgumentException("Invalid filetype for: \"{$path}\".");
        }

        $this->path   = $path;
        $this->reader = new \XMLReader();
    }
}
