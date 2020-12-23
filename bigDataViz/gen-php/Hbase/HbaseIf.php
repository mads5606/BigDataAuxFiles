<?php
namespace Hbase;

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

interface HbaseIf
{
    /**
     * Brings a table on-line (enables it)
     * 
     * @param string $tableName name of the table
     * 
     * @throws \Hbase\IOError
     */
    public function enableTable($tableName);
    /**
     * Disables a table (takes it off-line) If it is being served, the master
     * will tell the servers to stop serving it.
     * 
     * @param string $tableName name of the table
     * 
     * @throws \Hbase\IOError
     */
    public function disableTable($tableName);
    /**
     * @return true if table is on-line
     * 
     * @param string $tableName name of the table to check
     * 
     * @return bool
     * @throws \Hbase\IOError
     */
    public function isTableEnabled($tableName);
    /**
     * @param string $tableNameOrRegionName
     * @throws \Hbase\IOError
     */
    public function compact($tableNameOrRegionName);
    /**
     * @param string $tableNameOrRegionName
     * @throws \Hbase\IOError
     */
    public function majorCompact($tableNameOrRegionName);
    /**
     * List all the userspace tables.
     * 
     * @return returns a list of names
     * 
     * @return string[]
     * @throws \Hbase\IOError
     */
    public function getTableNames();
    /**
     * List all the column families assoicated with a table.
     * 
     * @return list of column family descriptors
     * 
     * @param string $tableName table name
     * 
     * @return array
     * @throws \Hbase\IOError
     */
    public function getColumnDescriptors($tableName);
    /**
     * List the regions associated with a table.
     * 
     * @return list of region descriptors
     * 
     * @param string $tableName table name
     * 
     * @return \Hbase\TRegionInfo[]
     * @throws \Hbase\IOError
     */
    public function getTableRegions($tableName);
    /**
     * Create a table with the specified column families.  The name
     * field for each ColumnDescriptor must be set and must end in a
     * colon (:). All other fields are optional and will get default
     * values if not explicitly specified.
     * 
     * @throws IllegalArgument if an input parameter is invalid
     * 
     * @throws AlreadyExists if the table name already exists
     * 
     * @param string $tableName name of table to create
     * 
     * @param \Hbase\ColumnDescriptor[] $columnFamilies list of column family descriptors
     * 
     * @throws \Hbase\IOError
     * @throws \Hbase\IllegalArgument
     * @throws \Hbase\AlreadyExists
     */
    public function createTable($tableName, array $columnFamilies);
    /**
     * Deletes a table
     * 
     * @throws IOError if table doesn't exist on server or there was some other
     * problem
     * 
     * @param string $tableName name of table to delete
     * 
     * @throws \Hbase\IOError
     */
    public function deleteTable($tableName);
    /**
     * Get a single TCell for the specified table, row, and column at the
     * latest timestamp. Returns an empty list if no such value exists.
     * 
     * @return value for specified row/column
     * 
     * @param string $tableName name of table
     * 
     * @param string $row row key
     * 
     * @param string $column column name
     * 
     * @param array $attributes Get attributes
     * 
     * @return \Hbase\TCell[]
     * @throws \Hbase\IOError
     */
    public function get($tableName, $row, $column, array $attributes);
    /**
     * Get the specified number of versions for the specified table,
     * row, and column.
     * 
     * @return list of cells for specified row/column
     * 
     * @param string $tableName name of table
     * 
     * @param string $row row key
     * 
     * @param string $column column name
     * 
     * @param int $numVersions number of versions to retrieve
     * 
     * @param array $attributes Get attributes
     * 
     * @return \Hbase\TCell[]
     * @throws \Hbase\IOError
     */
    public function getVer($tableName, $row, $column, $numVersions, array $attributes);
    /**
     * Get the specified number of versions for the specified table,
     * row, and column.  Only versions less than or equal to the specified
     * timestamp will be returned.
     * 
     * @return list of cells for specified row/column
     * 
     * @param string $tableName name of table
     * 
     * @param string $row row key
     * 
     * @param string $column column name
     * 
     * @param int $timestamp timestamp
     * 
     * @param int $numVersions number of versions to retrieve
     * 
     * @param array $attributes Get attributes
     * 
     * @return \Hbase\TCell[]
     * @throws \Hbase\IOError
     */
    public function getVerTs($tableName, $row, $column, $timestamp, $numVersions, array $attributes);
    /**
     * Get all the data for the specified table and row at the latest
     * timestamp. Returns an empty list if the row does not exist.
     * 
     * @return TRowResult containing the row and map of columns to TCells
     * 
     * @param string $tableName name of table
     * 
     * @param string $row row key
     * 
     * @param array $attributes Get attributes
     * 
     * @return \Hbase\TRowResult[]
     * @throws \Hbase\IOError
     */
    public function getRow($tableName, $row, array $attributes);
    /**
     * Get the specified columns for the specified table and row at the latest
     * timestamp. Returns an empty list if the row does not exist.
     * 
     * @return TRowResult containing the row and map of columns to TCells
     * 
     * @param string $tableName name of table
     * 
     * @param string $row row key
     * 
     * @param string[] $columns List of columns to return, null for all columns
     * 
     * @param array $attributes Get attributes
     * 
     * @return \Hbase\TRowResult[]
     * @throws \Hbase\IOError
     */
    public function getRowWithColumns($tableName, $row, array $columns, array $attributes);
    /**
     * Get all the data for the specified table and row at the specified
     * timestamp. Returns an empty list if the row does not exist.
     * 
     * @return TRowResult containing the row and map of columns to TCells
     * 
     * @param string $tableName name of the table
     * 
     * @param string $row row key
     * 
     * @param int $timestamp timestamp
     * 
     * @param array $attributes Get attributes
     * 
     * @return \Hbase\TRowResult[]
     * @throws \Hbase\IOError
     */
    public function getRowTs($tableName, $row, $timestamp, array $attributes);
    /**
     * Get the specified columns for the specified table and row at the specified
     * timestamp. Returns an empty list if the row does not exist.
     * 
     * @return TRowResult containing the row and map of columns to TCells
     * 
     * @param string $tableName name of table
     * 
     * @param string $row row key
     * 
     * @param string[] $columns List of columns to return, null for all columns
     * 
     * @param int $timestamp
     * @param array $attributes Get attributes
     * 
     * @return \Hbase\TRowResult[]
     * @throws \Hbase\IOError
     */
    public function getRowWithColumnsTs($tableName, $row, array $columns, $timestamp, array $attributes);
    /**
     * Get all the data for the specified table and rows at the latest
     * timestamp. Returns an empty list if no rows exist.
     * 
     * @return TRowResult containing the rows and map of columns to TCells
     * 
     * @param string $tableName name of table
     * 
     * @param string[] $rows row keys
     * 
     * @param array $attributes Get attributes
     * 
     * @return \Hbase\TRowResult[]
     * @throws \Hbase\IOError
     */
    public function getRows($tableName, array $rows, array $attributes);
    /**
     * Get the specified columns for the specified table and rows at the latest
     * timestamp. Returns an empty list if no rows exist.
     * 
     * @return TRowResult containing the rows and map of columns to TCells
     * 
     * @param string $tableName name of table
     * 
     * @param string[] $rows row keys
     * 
     * @param string[] $columns List of columns to return, null for all columns
     * 
     * @param array $attributes Get attributes
     * 
     * @return \Hbase\TRowResult[]
     * @throws \Hbase\IOError
     */
    public function getRowsWithColumns($tableName, array $rows, array $columns, array $attributes);
    /**
     * Get all the data for the specified table and rows at the specified
     * timestamp. Returns an empty list if no rows exist.
     * 
     * @return TRowResult containing the rows and map of columns to TCells
     * 
     * @param string $tableName name of the table
     * 
     * @param string[] $rows row keys
     * 
     * @param int $timestamp timestamp
     * 
     * @param array $attributes Get attributes
     * 
     * @return \Hbase\TRowResult[]
     * @throws \Hbase\IOError
     */
    public function getRowsTs($tableName, array $rows, $timestamp, array $attributes);
    /**
     * Get the specified columns for the specified table and rows at the specified
     * timestamp. Returns an empty list if no rows exist.
     * 
     * @return TRowResult containing the rows and map of columns to TCells
     * 
     * @param string $tableName name of table
     * 
     * @param string[] $rows row keys
     * 
     * @param string[] $columns List of columns to return, null for all columns
     * 
     * @param int $timestamp
     * @param array $attributes Get attributes
     * 
     * @return \Hbase\TRowResult[]
     * @throws \Hbase\IOError
     */
    public function getRowsWithColumnsTs($tableName, array $rows, array $columns, $timestamp, array $attributes);
    /**
     * Apply a series of mutations (updates/deletes) to a row in a
     * single transaction.  If an exception is thrown, then the
     * transaction is aborted.  Default current timestamp is used, and
     * all entries will have an identical timestamp.
     * 
     * @param string $tableName name of table
     * 
     * @param string $row row key
     * 
     * @param \Hbase\Mutation[] $mutations list of mutation commands
     * 
     * @param array $attributes Mutation attributes
     * 
     * @throws \Hbase\IOError
     * @throws \Hbase\IllegalArgument
     */
    public function mutateRow($tableName, $row, array $mutations, array $attributes);
    /**
     * Apply a series of mutations (updates/deletes) to a row in a
     * single transaction.  If an exception is thrown, then the
     * transaction is aborted.  The specified timestamp is used, and
     * all entries will have an identical timestamp.
     * 
     * @param string $tableName name of table
     * 
     * @param string $row row key
     * 
     * @param \Hbase\Mutation[] $mutations list of mutation commands
     * 
     * @param int $timestamp timestamp
     * 
     * @param array $attributes Mutation attributes
     * 
     * @throws \Hbase\IOError
     * @throws \Hbase\IllegalArgument
     */
    public function mutateRowTs($tableName, $row, array $mutations, $timestamp, array $attributes);
    /**
     * Apply a series of batches (each a series of mutations on a single row)
     * in a single transaction.  If an exception is thrown, then the
     * transaction is aborted.  Default current timestamp is used, and
     * all entries will have an identical timestamp.
     * 
     * @param string $tableName name of table
     * 
     * @param \Hbase\BatchMutation[] $rowBatches list of row batches
     * 
     * @param array $attributes Mutation attributes
     * 
     * @throws \Hbase\IOError
     * @throws \Hbase\IllegalArgument
     */
    public function mutateRows($tableName, array $rowBatches, array $attributes);
    /**
     * Apply a series of batches (each a series of mutations on a single row)
     * in a single transaction.  If an exception is thrown, then the
     * transaction is aborted.  The specified timestamp is used, and
     * all entries will have an identical timestamp.
     * 
     * @param string $tableName name of table
     * 
     * @param \Hbase\BatchMutation[] $rowBatches list of row batches
     * 
     * @param int $timestamp timestamp
     * 
     * @param array $attributes Mutation attributes
     * 
     * @throws \Hbase\IOError
     * @throws \Hbase\IllegalArgument
     */
    public function mutateRowsTs($tableName, array $rowBatches, $timestamp, array $attributes);
    /**
     * Atomically increment the column value specified.  Returns the next value post increment.
     * 
     * @param string $tableName name of table
     * 
     * @param string $row row to increment
     * 
     * @param string $column name of column
     * 
     * @param int $value amount to increment by
     * 
     * @return int
     * @throws \Hbase\IOError
     * @throws \Hbase\IllegalArgument
     */
    public function atomicIncrement($tableName, $row, $column, $value);
    /**
     * Delete all cells that match the passed row and column.
     * 
     * @param string $tableName name of table
     * 
     * @param string $row Row to update
     * 
     * @param string $column name of column whose value is to be deleted
     * 
     * @param array $attributes Delete attributes
     * 
     * @throws \Hbase\IOError
     */
    public function deleteAll($tableName, $row, $column, array $attributes);
    /**
     * Delete all cells that match the passed row and column and whose
     * timestamp is equal-to or older than the passed timestamp.
     * 
     * @param string $tableName name of table
     * 
     * @param string $row Row to update
     * 
     * @param string $column name of column whose value is to be deleted
     * 
     * @param int $timestamp timestamp
     * 
     * @param array $attributes Delete attributes
     * 
     * @throws \Hbase\IOError
     */
    public function deleteAllTs($tableName, $row, $column, $timestamp, array $attributes);
    /**
     * Completely delete the row's cells.
     * 
     * @param string $tableName name of table
     * 
     * @param string $row key of the row to be completely deleted.
     * 
     * @param array $attributes Delete attributes
     * 
     * @throws \Hbase\IOError
     */
    public function deleteAllRow($tableName, $row, array $attributes);
    /**
     * Increment a cell by the ammount.
     * Increments can be applied async if hbase.regionserver.thrift.coalesceIncrement is set to true.
     * False is the default.  Turn to true if you need the extra performance and can accept some
     * data loss if a thrift server dies with increments still in the queue.
     * 
     * @param \Hbase\TIncrement $increment The single increment to apply
     * 
     * @throws \Hbase\IOError
     */
    public function increment(\Hbase\TIncrement $increment);
    /**
     * @param \Hbase\TIncrement[] $increments The list of increments
     * 
     * @throws \Hbase\IOError
     */
    public function incrementRows(array $increments);
    /**
     * Completely delete the row's cells marked with a timestamp
     * equal-to or older than the passed timestamp.
     * 
     * @param string $tableName name of table
     * 
     * @param string $row key of the row to be completely deleted.
     * 
     * @param int $timestamp timestamp
     * 
     * @param array $attributes Delete attributes
     * 
     * @throws \Hbase\IOError
     */
    public function deleteAllRowTs($tableName, $row, $timestamp, array $attributes);
    /**
     * Get a scanner on the current table, using the Scan instance
     * for the scan parameters.
     * 
     * @param string $tableName name of table
     * 
     * @param \Hbase\TScan $scan Scan instance
     * 
     * @param array $attributes Scan attributes
     * 
     * @return int
     * @throws \Hbase\IOError
     */
    public function scannerOpenWithScan($tableName, \Hbase\TScan $scan, array $attributes);
    /**
     * Get a scanner on the current table starting at the specified row and
     * ending at the last row in the table.  Return the specified columns.
     * 
     * @return scanner id to be used with other scanner procedures
     * 
     * @param string $tableName name of table
     * 
     * @param string $startRow Starting row in table to scan.
     * Send "" (empty string) to start at the first row.
     * 
     * @param string[] $columns columns to scan. If column name is a column family, all
     * columns of the specified column family are returned. It's also possible
     * to pass a regex in the column qualifier.
     * 
     * @param array $attributes Scan attributes
     * 
     * @return int
     * @throws \Hbase\IOError
     */
    public function scannerOpen($tableName, $startRow, array $columns, array $attributes);
    /**
     * Get a scanner on the current table starting and stopping at the
     * specified rows.  ending at the last row in the table.  Return the
     * specified columns.
     * 
     * @return scanner id to be used with other scanner procedures
     * 
     * @param string $tableName name of table
     * 
     * @param string $startRow Starting row in table to scan.
     * Send "" (empty string) to start at the first row.
     * 
     * @param string $stopRow row to stop scanning on. This row is *not* included in the
     * scanner's results
     * 
     * @param string[] $columns columns to scan. If column name is a column family, all
     * columns of the specified column family are returned. It's also possible
     * to pass a regex in the column qualifier.
     * 
     * @param array $attributes Scan attributes
     * 
     * @return int
     * @throws \Hbase\IOError
     */
    public function scannerOpenWithStop($tableName, $startRow, $stopRow, array $columns, array $attributes);
    /**
     * Open a scanner for a given prefix.  That is all rows will have the specified
     * prefix. No other rows will be returned.
     * 
     * @return scanner id to use with other scanner calls
     * 
     * @param string $tableName name of table
     * 
     * @param string $startAndPrefix the prefix (and thus start row) of the keys you want
     * 
     * @param string[] $columns the columns you want returned
     * 
     * @param array $attributes Scan attributes
     * 
     * @return int
     * @throws \Hbase\IOError
     */
    public function scannerOpenWithPrefix($tableName, $startAndPrefix, array $columns, array $attributes);
    /**
     * Get a scanner on the current table starting at the specified row and
     * ending at the last row in the table.  Return the specified columns.
     * Only values with the specified timestamp are returned.
     * 
     * @return scanner id to be used with other scanner procedures
     * 
     * @param string $tableName name of table
     * 
     * @param string $startRow Starting row in table to scan.
     * Send "" (empty string) to start at the first row.
     * 
     * @param string[] $columns columns to scan. If column name is a column family, all
     * columns of the specified column family are returned. It's also possible
     * to pass a regex in the column qualifier.
     * 
     * @param int $timestamp timestamp
     * 
     * @param array $attributes Scan attributes
     * 
     * @return int
     * @throws \Hbase\IOError
     */
    public function scannerOpenTs($tableName, $startRow, array $columns, $timestamp, array $attributes);
    /**
     * Get a scanner on the current table starting and stopping at the
     * specified rows.  ending at the last row in the table.  Return the
     * specified columns.  Only values with the specified timestamp are
     * returned.
     * 
     * @return scanner id to be used with other scanner procedures
     * 
     * @param string $tableName name of table
     * 
     * @param string $startRow Starting row in table to scan.
     * Send "" (empty string) to start at the first row.
     * 
     * @param string $stopRow row to stop scanning on. This row is *not* included in the
     * scanner's results
     * 
     * @param string[] $columns columns to scan. If column name is a column family, all
     * columns of the specified column family are returned. It's also possible
     * to pass a regex in the column qualifier.
     * 
     * @param int $timestamp timestamp
     * 
     * @param array $attributes Scan attributes
     * 
     * @return int
     * @throws \Hbase\IOError
     */
    public function scannerOpenWithStopTs($tableName, $startRow, $stopRow, array $columns, $timestamp, array $attributes);
    /**
     * Returns the scanner's current row value and advances to the next
     * row in the table.  When there are no more rows in the table, or a key
     * greater-than-or-equal-to the scanner's specified stopRow is reached,
     * an empty list is returned.
     * 
     * @return a TRowResult containing the current row and a map of the columns to TCells.
     * 
     * @throws IllegalArgument if ScannerID is invalid
     * 
     * @throws NotFound when the scanner reaches the end
     * 
     * @param int $id id of a scanner returned by scannerOpen
     * 
     * @return \Hbase\TRowResult[]
     * @throws \Hbase\IOError
     * @throws \Hbase\IllegalArgument
     */
    public function scannerGet($id);
    /**
     * Returns, starting at the scanner's current row value nbRows worth of
     * rows and advances to the next row in the table.  When there are no more
     * rows in the table, or a key greater-than-or-equal-to the scanner's
     * specified stopRow is reached,  an empty list is returned.
     * 
     * @return a TRowResult containing the current row and a map of the columns to TCells.
     * 
     * @throws IllegalArgument if ScannerID is invalid
     * 
     * @throws NotFound when the scanner reaches the end
     * 
     * @param int $id id of a scanner returned by scannerOpen
     * 
     * @param int $nbRows number of results to return
     * 
     * @return \Hbase\TRowResult[]
     * @throws \Hbase\IOError
     * @throws \Hbase\IllegalArgument
     */
    public function scannerGetList($id, $nbRows);
    /**
     * Closes the server-state associated with an open scanner.
     * 
     * @throws IllegalArgument if ScannerID is invalid
     * 
     * @param int $id id of a scanner returned by scannerOpen
     * 
     * @throws \Hbase\IOError
     * @throws \Hbase\IllegalArgument
     */
    public function scannerClose($id);
    /**
     * Get the row just before the specified one.
     * 
     * @return value for specified row/column
     * 
     * @param string $tableName name of table
     * 
     * @param string $row row key
     * 
     * @param string $family column name
     * 
     * @return \Hbase\TCell[]
     * @throws \Hbase\IOError
     */
    public function getRowOrBefore($tableName, $row, $family);
    /**
     * Get the regininfo for the specified row. It scans
     * the metatable to find region's start and end keys.
     * 
     * @return value for specified row/column
     * 
     * @param string $row row key
     * 
     * @return \Hbase\TRegionInfo A TRegionInfo contains information about an HTable region.
     * 
     * @throws \Hbase\IOError
     */
    public function getRegionInfo($row);
    /**
     * Appends values to one or more columns within a single row.
     * 
     * @return values of columns after the append operation.
     * 
     * @param \Hbase\TAppend $append The single append operation to apply
     * 
     * @return \Hbase\TCell[]
     * @throws \Hbase\IOError
     */
    public function append(\Hbase\TAppend $append);
    /**
     * Atomically checks if a row/family/qualifier value matches the expected
     * value. If it does, it adds the corresponding mutation operation for put.
     * 
     * @return true if the new put was executed, false otherwise
     * 
     * @param string $tableName name of table
     * 
     * @param string $row row key
     * 
     * @param string $column column name
     * 
     * @param string $value the expected value for the column parameter, if not
     * provided the check is for the non-existence of the
     * column in question
     * 
     * @param \Hbase\Mutation $mput mutation for the put
     * 
     * @param array $attributes Mutation attributes
     * 
     * @return bool
     * @throws \Hbase\IOError
     * @throws \Hbase\IllegalArgument
     */
    public function checkAndPut($tableName, $row, $column, $value, \Hbase\Mutation $mput, array $attributes);
}
