<?php
/**
 * Autogenerated by Thrift Compiler (0.14.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class THBaseService_isTableAvailableWithSplit_args
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'tableName',
            'isRequired' => true,
            'type' => TType::STRUCT,
            'class' => '\TTableName',
        ),
        2 => array(
            'var' => 'splitKeys',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
                'type' => TType::STRING,
                ),
        ),
    );

    /**
     * the tablename to check
     * 
     * @var \TTableName
     */
    public $tableName = null;
    /**
     * keys to check if the table has been created with all split keys
     * 
     * @var string[]
     */
    public $splitKeys = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['tableName'])) {
                $this->tableName = $vals['tableName'];
            }
            if (isset($vals['splitKeys'])) {
                $this->splitKeys = $vals['splitKeys'];
            }
        }
    }

    public function getName()
    {
        return 'THBaseService_isTableAvailableWithSplit_args';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->tableName = new \TTableName();
                        $xfer += $this->tableName->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->splitKeys = array();
                        $_size288 = 0;
                        $_etype291 = 0;
                        $xfer += $input->readListBegin($_etype291, $_size288);
                        for ($_i292 = 0; $_i292 < $_size288; ++$_i292) {
                            $elem293 = null;
                            $xfer += $input->readString($elem293);
                            $this->splitKeys []= $elem293;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('THBaseService_isTableAvailableWithSplit_args');
        if ($this->tableName !== null) {
            if (!is_object($this->tableName)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('tableName', TType::STRUCT, 1);
            $xfer += $this->tableName->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->splitKeys !== null) {
            if (!is_array($this->splitKeys)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('splitKeys', TType::LST, 2);
            $output->writeListBegin(TType::STRING, count($this->splitKeys));
            foreach ($this->splitKeys as $iter294) {
                $xfer += $output->writeString($iter294);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
