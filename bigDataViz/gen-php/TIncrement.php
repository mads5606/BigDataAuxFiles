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

/**
 * Used to perform Increment operations for a single row.
 * 
 * You can specify how this Increment should be written to the write-ahead Log (WAL)
 * by changing the durability. If you don't provide durability, it defaults to
 * column family's default setting for durability.
 */
class TIncrement
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'row',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'columns',
            'isRequired' => true,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\TColumnIncrement',
                ),
        ),
        4 => array(
            'var' => 'attributes',
            'isRequired' => false,
            'type' => TType::MAP,
            'ktype' => TType::STRING,
            'vtype' => TType::STRING,
            'key' => array(
                'type' => TType::STRING,
            ),
            'val' => array(
                'type' => TType::STRING,
                ),
        ),
        5 => array(
            'var' => 'durability',
            'isRequired' => false,
            'type' => TType::I32,
            'class' => '\TDurability',
        ),
        6 => array(
            'var' => 'cellVisibility',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\TCellVisibility',
        ),
        7 => array(
            'var' => 'returnResults',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
    );

    /**
     * @var string
     */
    public $row = null;
    /**
     * @var \TColumnIncrement[]
     */
    public $columns = null;
    /**
     * @var array
     */
    public $attributes = null;
    /**
     * @var int
     */
    public $durability = null;
    /**
     * @var \TCellVisibility
     */
    public $cellVisibility = null;
    /**
     * @var bool
     */
    public $returnResults = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['row'])) {
                $this->row = $vals['row'];
            }
            if (isset($vals['columns'])) {
                $this->columns = $vals['columns'];
            }
            if (isset($vals['attributes'])) {
                $this->attributes = $vals['attributes'];
            }
            if (isset($vals['durability'])) {
                $this->durability = $vals['durability'];
            }
            if (isset($vals['cellVisibility'])) {
                $this->cellVisibility = $vals['cellVisibility'];
            }
            if (isset($vals['returnResults'])) {
                $this->returnResults = $vals['returnResults'];
            }
        }
    }

    public function getName()
    {
        return 'TIncrement';
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
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->row);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->columns = array();
                        $_size62 = 0;
                        $_etype65 = 0;
                        $xfer += $input->readListBegin($_etype65, $_size62);
                        for ($_i66 = 0; $_i66 < $_size62; ++$_i66) {
                            $elem67 = null;
                            $elem67 = new \TColumnIncrement();
                            $xfer += $elem67->read($input);
                            $this->columns []= $elem67;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::MAP) {
                        $this->attributes = array();
                        $_size68 = 0;
                        $_ktype69 = 0;
                        $_vtype70 = 0;
                        $xfer += $input->readMapBegin($_ktype69, $_vtype70, $_size68);
                        for ($_i72 = 0; $_i72 < $_size68; ++$_i72) {
                            $key73 = '';
                            $val74 = '';
                            $xfer += $input->readString($key73);
                            $xfer += $input->readString($val74);
                            $this->attributes[$key73] = $val74;
                        }
                        $xfer += $input->readMapEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->durability);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::STRUCT) {
                        $this->cellVisibility = new \TCellVisibility();
                        $xfer += $this->cellVisibility->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->returnResults);
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
        $xfer += $output->writeStructBegin('TIncrement');
        if ($this->row !== null) {
            $xfer += $output->writeFieldBegin('row', TType::STRING, 1);
            $xfer += $output->writeString($this->row);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->columns !== null) {
            if (!is_array($this->columns)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('columns', TType::LST, 2);
            $output->writeListBegin(TType::STRUCT, count($this->columns));
            foreach ($this->columns as $iter75) {
                $xfer += $iter75->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->attributes !== null) {
            if (!is_array($this->attributes)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('attributes', TType::MAP, 4);
            $output->writeMapBegin(TType::STRING, TType::STRING, count($this->attributes));
            foreach ($this->attributes as $kiter76 => $viter77) {
                $xfer += $output->writeString($kiter76);
                $xfer += $output->writeString($viter77);
            }
            $output->writeMapEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->durability !== null) {
            $xfer += $output->writeFieldBegin('durability', TType::I32, 5);
            $xfer += $output->writeI32($this->durability);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->cellVisibility !== null) {
            if (!is_object($this->cellVisibility)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('cellVisibility', TType::STRUCT, 6);
            $xfer += $this->cellVisibility->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->returnResults !== null) {
            $xfer += $output->writeFieldBegin('returnResults', TType::BOOL, 7);
            $xfer += $output->writeBool($this->returnResults);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}