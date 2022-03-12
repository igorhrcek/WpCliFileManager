<?php

namespace WpCliFileManager;

use WpCliFileManager\Exceptions\FileDoesNotExist;
use WpCliFileManager\Exceptions\FileIsNotReadable;
use WpCliFileManager\Exceptions\FileIsNotWritable;
use WpCliFileManager\Exceptions\RuleAlreadyExist;

class Error {

    public const THROW_NONE = 0;
    public const FILE_DOES_NOT_EXIST = 1;
    public const FILE_IS_NOT_READABLE = 2;
    public const RULE_ALREADY_EXIST = 3;
    public const FILE_IS_NOT_WRITABLE = 4;

    /**
     * @var mixed
     */
    private mixed $tmp;

    /**
     * @throws FileDoesNotExist
     * @throws FileIsNotReadable
     * @throws RuleAlreadyExist
     * @throws FileIsNotWritable
     */
    public function __construct($code = self::THROW_NONE) {
        switch($code) {
            case self::FILE_DOES_NOT_EXIST:
                throw new FileDoesNotExist();
                break;

            case self::FILE_IS_NOT_READABLE:
                throw new FileIsNotReadable();
                break;

            case self::RULE_ALREADY_EXIST:
                throw new RuleAlreadyExist();
                break;

            case self::FILE_IS_NOT_WRITABLE:
                throw new FileIsNotWritable();
                break;

            default:
                //No exception
                $this->tmp = $code;
                break;
        }
    }
}