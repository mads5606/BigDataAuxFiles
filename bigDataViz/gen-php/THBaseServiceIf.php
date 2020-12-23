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

interface THBaseServiceIf
{
    /**
     * Test for the existence of columns in the table, as specified in the TGet.
     * 
     * @return true if the specified TGet matches one or more keys, false if not
     * 
     * @param string $table the table to check on
     * 
     * @param \TGet $tget the TGet to check for
     * 
     * @return bool
     * @throws \TIOError
     */
    public function exists($table, \TGet $tget);
    /**
     * Test for the existence of columns in the table, as specified by the TGets.
     * 
     * This will return an array of booleans. Each value will be true if the related Get matches
     * one or more keys, false if not.
     * 
     * @param string $table the table to check on
     * 
     * @param \TGet[] $tgets a list of TGets to check for
     * 
     * @return bool[]
     * @throws \TIOError
     */
    public function existsAll($table, array $tgets);
    /**
     * Method for getting data from a row.
     * 
     * If the row cannot be found an empty Result is returned.
     * This can be checked by the empty field of the TResult
     * 
     * @return the result
     * 
     * @param string $table the table to get from
     * 
     * @param \TGet $tget the TGet to fetch
     * 
     * @return \TResult if no Result is found, row and columnValues will not be set.
     * 
     * @throws \TIOError
     */
    public function get($table, \TGet $tget);
    /**
     * Method for getting multiple rows.
     * 
     * If a row cannot be found there will be a null
     * value in the result list for that TGet at the
     * same position.
     * 
     * So the Results are in the same order as the TGets.
     * 
     * @param string $table the table to get from
     * 
     * @param \TGet[] $tgets a list of TGets to fetch, the Result list
     * will have the Results at corresponding positions
     * or null if there was an error
     * 
     * @return \TResult[]
     * @throws \TIOError
     */
    public function getMultiple($table, array $tgets);
    /**
     * Commit a TPut to a table.
     * 
     * @param string $table the table to put data in
     * 
     * @param \TPut $tput the TPut to put
     * 
     * @throws \TIOError
     */
    public function put($table, \TPut $tput);
    /**
     * Atomically checks if a row/family/qualifier value matches the expected
     * value. If it does, it adds the TPut.
     * 
     * @return true if the new put was executed, false otherwise
     * 
     * @param string $table to check in and put to
     * 
     * @param string $row row to check
     * 
     * @param string $family column family to check
     * 
     * @param string $qualifier column qualifier to check
     * 
     * @param string $value the expected value, if not provided the
     * check is for the non-existence of the
     * column in question
     * 
     * @param \TPut $tput the TPut to put if the check succeeds
     * 
     * @return bool
     * @throws \TIOError
     */
    public function checkAndPut($table, $row, $family, $qualifier, $value, \TPut $tput);
    /**
     * Commit a List of Puts to the table.
     * 
     * @param string $table the table to put data in
     * 
     * @param \TPut[] $tputs a list of TPuts to commit
     * 
     * @throws \TIOError
     */
    public function putMultiple($table, array $tputs);
    /**
     * Deletes as specified by the TDelete.
     * 
     * Note: "delete" is a reserved keyword and cannot be used in Thrift
     * thus the inconsistent naming scheme from the other functions.
     * 
     * @param string $table the table to delete from
     * 
     * @param \TDelete $tdelete the TDelete to delete
     * 
     * @throws \TIOError
     */
    public function deleteSingle($table, \TDelete $tdelete);
    /**
     * Bulk commit a List of TDeletes to the table.
     * 
     * Throws a TIOError if any of the deletes fail.
     * 
     * Always returns an empty list for backwards compatibility.
     * 
     * @param string $table the table to delete from
     * 
     * @param \TDelete[] $tdeletes list of TDeletes to delete
     * 
     * @return \TDelete[]
     * @throws \TIOError
     */
    public function deleteMultiple($table, array $tdeletes);
    /**
     * Atomically checks if a row/family/qualifier value matches the expected
     * value. If it does, it adds the delete.
     * 
     * @return true if the new delete was executed, false otherwise
     * 
     * @param string $table to check in and delete from
     * 
     * @param string $row row to check
     * 
     * @param string $family column family to check
     * 
     * @param string $qualifier column qualifier to check
     * 
     * @param string $value the expected value, if not provided the
     * check is for the non-existence of the
     * column in question
     * 
     * @param \TDelete $tdelete the TDelete to execute if the check succeeds
     * 
     * @return bool
     * @throws \TIOError
     */
    public function checkAndDelete($table, $row, $family, $qualifier, $value, \TDelete $tdelete);
    /**
     * @param string $table the table to increment the value on
     * 
     * @param \TIncrement $tincrement the TIncrement to increment
     * 
     * @return \TResult if no Result is found, row and columnValues will not be set.
     * 
     * @throws \TIOError
     */
    public function increment($table, \TIncrement $tincrement);
    /**
     * @param string $table the table to append the value on
     * 
     * @param \TAppend $tappend the TAppend to append
     * 
     * @return \TResult if no Result is found, row and columnValues will not be set.
     * 
     * @throws \TIOError
     */
    public function append($table, \TAppend $tappend);
    /**
     * Get a Scanner for the provided TScan object.
     * 
     * @return Scanner Id to be used with other scanner procedures
     * 
     * @param string $table the table to get the Scanner for
     * 
     * @param \TScan $tscan the scan object to get a Scanner for
     * 
     * @return int
     * @throws \TIOError
     */
    public function openScanner($table, \TScan $tscan);
    /**
     * Grabs multiple rows from a Scanner.
     * 
     * @return Between zero and numRows TResults
     * 
     * @param int $scannerId the Id of the Scanner to return rows from. This is an Id returned from the openScanner function.
     * 
     * @param int $numRows number of rows to return
     * 
     * @return \TResult[]
     * @throws \TIOError
     * @throws \TIllegalArgument if the scannerId is invalid
     * 
     */
    public function getScannerRows($scannerId, $numRows);
    /**
     * Closes the scanner. Should be called to free server side resources timely.
     * Typically close once the scanner is not needed anymore, i.e. after looping
     * over it to get all the required rows.
     * 
     * @param int $scannerId the Id of the Scanner to close *
     * 
     * @throws \TIOError
     * @throws \TIllegalArgument if the scannerId is invalid
     * 
     */
    public function closeScanner($scannerId);
    /**
     * mutateRow performs multiple mutations atomically on a single row.
     * 
     * @param string $table table to apply the mutations
     * 
     * @param \TRowMutations $trowMutations mutations to apply
     * 
     * @throws \TIOError
     */
    public function mutateRow($table, \TRowMutations $trowMutations);
    /**
     * Get results for the provided TScan object.
     * This helper function opens a scanner, get the results and close the scanner.
     * 
     * @return between zero and numRows TResults
     * 
     * @param string $table the table to get the Scanner for
     * 
     * @param \TScan $tscan the scan object to get a Scanner for
     * 
     * @param int $numRows number of rows to return
     * 
     * @return \TResult[]
     * @throws \TIOError
     */
    public function getScannerResults($table, \TScan $tscan, $numRows);
    /**
     * Given a table and a row get the location of the region that
     * would contain the given row key.
     * 
     * reload = true means the cache will be cleared and the location
     * will be fetched from meta.
     * 
     * @param string $table
     * @param string $row
     * @param bool $reload
     * @return \THRegionLocation
     * @throws \TIOError
     */
    public function getRegionLocation($table, $row, $reload);
    /**
     * Get all of the region locations for a given table.
     * 
     * 
     * @param string $table
     * @return \THRegionLocation[]
     * @throws \TIOError
     */
    public function getAllRegionLocations($table);
    /**
     * Atomically checks if a row/family/qualifier value matches the expected
     * value. If it does, it mutates the row.
     * 
     * @return true if the row was mutated, false otherwise
     * 
     * @param string $table to check in and delete from
     * 
     * @param string $row row to check
     * 
     * @param string $family column family to check
     * 
     * @param string $qualifier column qualifier to check
     * 
     * @param int $compareOp comparison to make on the value
     * 
     * @param string $value the expected value to be compared against, if not provided the
     * check is for the non-existence of the column in question
     * 
     * @param \TRowMutations $rowMutations row mutations to execute if the value matches
     * 
     * @return bool
     * @throws \TIOError
     */
    public function checkAndMutate($table, $row, $family, $qualifier, $compareOp, $value, \TRowMutations $rowMutations);
    /**
     * Get a table descriptor.
     * @return the TableDescriptor of the giving tablename
     * 
     * 
     * @param \TTableName $table the tablename of the table to get tableDescriptor
     * 
     * @return \TTableDescriptor Thrift wrapper around
     * org.apache.hadoop.hbase.client.TableDescriptor
     * 
     * @throws \TIOError
     */
    public function getTableDescriptor(\TTableName $table);
    /**
     * Get table descriptors of tables.
     * @return the TableDescriptor of the giving tablename
     * 
     * 
     * @param \TTableName[] $tables the tablename list of the tables to get tableDescriptor
     * 
     * @return \TTableDescriptor[]
     * @throws \TIOError
     */
    public function getTableDescriptors(array $tables);
    /**
     * 
     * @return true if table exists already, false if not
     * 
     * 
     * @param \TTableName $tableName the tablename of the tables to check
     * 
     * @return bool
     * @throws \TIOError
     */
    public function tableExists(\TTableName $tableName);
    /**
     * Get table descriptors of tables that match the given pattern
     * @return the tableDescriptors of the matching table
     * 
     * 
     * @param string $regex The regular expression to match against
     * 
     * @param bool $includeSysTables set to false if match only against userspace tables
     * 
     * @return \TTableDescriptor[]
     * @throws \TIOError
     */
    public function getTableDescriptorsByPattern($regex, $includeSysTables);
    /**
     * Get table descriptors of tables in the given namespace
     * @return the tableDescriptors in the namespce
     * 
     * 
     * @param string $name The namesapce's name
     * 
     * @return \TTableDescriptor[]
     * @throws \TIOError
     */
    public function getTableDescriptorsByNamespace($name);
    /**
     * Get table names of tables that match the given pattern
     * @return the table names of the matching table
     * 
     * 
     * @param string $regex The regular expression to match against
     * 
     * @param bool $includeSysTables set to false if match only against userspace tables
     * 
     * @return \TTableName[]
     * @throws \TIOError
     */
    public function getTableNamesByPattern($regex, $includeSysTables);
    /**
     * Get table names of tables in the given namespace
     * @return the table names of the matching table
     * 
     * 
     * @param string $name The namesapce's name
     * 
     * @return \TTableName[]
     * @throws \TIOError
     */
    public function getTableNamesByNamespace($name);
    /**
     * Creates a new table with an initial set of empty regions defined by the specified split keys.
     * The total number of regions created will be the number of split keys plus one. Synchronous
     * operation.
     * 
     * 
     * @param \TTableDescriptor $desc table descriptor for table
     * 
     * @param string[] $splitKeys rray of split keys for the initial regions of the table
     * 
     * @throws \TIOError
     */
    public function createTable(\TTableDescriptor $desc, array $splitKeys);
    /**
     * Deletes a table. Synchronous operation.
     * 
     * 
     * @param \TTableName $tableName the tablename to delete
     * 
     * @throws \TIOError
     */
    public function deleteTable(\TTableName $tableName);
    /**
     * Truncate a table. Synchronous operation.
     * 
     * 
     * @param \TTableName $tableName the tablename to truncate
     * 
     * @param bool $preserveSplits whether to  preserve previous splits
     * 
     * @throws \TIOError
     */
    public function truncateTable(\TTableName $tableName, $preserveSplits);
    /**
     * Enalbe a table
     * 
     * 
     * @param \TTableName $tableName the tablename to enable
     * 
     * @throws \TIOError
     */
    public function enableTable(\TTableName $tableName);
    /**
     * Disable a table
     * 
     * 
     * @param \TTableName $tableName the tablename to disable
     * 
     * @throws \TIOError
     */
    public function disableTable(\TTableName $tableName);
    /**
     * 
     * @return true if table is enabled, false if not
     * 
     * 
     * @param \TTableName $tableName the tablename to check
     * 
     * @return bool
     * @throws \TIOError
     */
    public function isTableEnabled(\TTableName $tableName);
    /**
     * 
     * @return true if table is disabled, false if not
     * 
     * 
     * @param \TTableName $tableName the tablename to check
     * 
     * @return bool
     * @throws \TIOError
     */
    public function isTableDisabled(\TTableName $tableName);
    /**
     * 
     * @return true if table is available, false if not
     * 
     * 
     * @param \TTableName $tableName the tablename to check
     * 
     * @return bool
     * @throws \TIOError
     */
    public function isTableAvailable(\TTableName $tableName);
    /**
     *  * Use this api to check if the table has been created with the specified number of splitkeys
     *  * which was used while creating the given table. Note : If this api is used after a table's
     *  * region gets splitted, the api may return false.
     *  *
     *  * @return true if table is available, false if not
     *  *
     *  * @deprecated Since 2.2.0. Because the same method in Table interface has been deprecated
     *  * since 2.0.0, we will remove it in 3.0.0 release.
     *  * Use {@link #isTableAvailable(TTableName tableName)} instead
     * *
     * 
     * @param \TTableName $tableName the tablename to check
     * 
     * @param string[] $splitKeys keys to check if the table has been created with all split keys
     * 
     * @return bool
     * @throws \TIOError
     */
    public function isTableAvailableWithSplit(\TTableName $tableName, array $splitKeys);
    /**
     * Add a column family to an existing table. Synchronous operation.
     * 
     * 
     * @param \TTableName $tableName the tablename to add column family to
     * 
     * @param \TColumnFamilyDescriptor $column column family descriptor of column family to be added
     * 
     * @throws \TIOError
     */
    public function addColumnFamily(\TTableName $tableName, \TColumnFamilyDescriptor $column);
    /**
     * Delete a column family from a table. Synchronous operation.
     * 
     * 
     * @param \TTableName $tableName the tablename to delete column family from
     * 
     * @param string $column name of column family to be deleted
     * 
     * @throws \TIOError
     */
    public function deleteColumnFamily(\TTableName $tableName, $column);
    /**
     * Modify an existing column family on a table. Synchronous operation.
     * 
     * 
     * @param \TTableName $tableName the tablename to modify column family
     * 
     * @param \TColumnFamilyDescriptor $column column family descriptor of column family to be modified
     * 
     * @throws \TIOError
     */
    public function modifyColumnFamily(\TTableName $tableName, \TColumnFamilyDescriptor $column);
    /**
     * Modify an existing table
     * 
     * 
     * @param \TTableDescriptor $desc the descriptor of the table to modify
     * 
     * @throws \TIOError
     */
    public function modifyTable(\TTableDescriptor $desc);
    /**
     * Create a new namespace. Blocks until namespace has been successfully created or an exception is
     * thrown
     * 
     * 
     * @param \TNamespaceDescriptor $namespaceDesc descriptor which describes the new namespace
     * 
     * @throws \TIOError
     */
    public function createNamespace(\TNamespaceDescriptor $namespaceDesc);
    /**
     * Modify an existing namespace.  Blocks until namespace has been successfully modified or an
     * exception is thrown
     * 
     * 
     * @param \TNamespaceDescriptor $namespaceDesc descriptor which describes the new namespace
     * 
     * @throws \TIOError
     */
    public function modifyNamespace(\TNamespaceDescriptor $namespaceDesc);
    /**
     * Delete an existing namespace. Only empty namespaces (no tables) can be removed.
     * Blocks until namespace has been successfully deleted or an
     * exception is thrown.
     * 
     * 
     * @param string $name namespace name
     * 
     * @throws \TIOError
     */
    public function deleteNamespace($name);
    /**
     * Get a namespace descriptor by name.
     * @retrun the descriptor
     * 
     * 
     * @param string $name name of namespace descriptor
     * 
     * @return \TNamespaceDescriptor Thrift wrapper around
     * org.apache.hadoop.hbase.NamespaceDescriptor
     * 
     * @throws \TIOError
     */
    public function getNamespaceDescriptor($name);
    /**
     * @return all namespaces
     * 
     * 
     * @return \TNamespaceDescriptor[]
     * @throws \TIOError
     */
    public function listNamespaceDescriptors();
}