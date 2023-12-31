<?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * Service definition for DoubleClickBidManager (v1).
 *
 * <p>
 * API for viewing and managing your reports in DoubleClick Bid Manager.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/bid-manager/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class SmartSEO_Google_Service_DoubleClickBidManager extends SmartSEO_Google_Service
{


  public $lineitems;
  public $queries;
  public $reports;
  

  /**
   * Constructs the internal representation of the DoubleClickBidManager
   * service.
   *
   * @param SmartSEO_Google_Client $client
   */
  public function __construct(SmartSEO_Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'doubleclickbidmanager/v1/';
    $this->version = 'v1';
    $this->serviceName = 'doubleclickbidmanager';

    $this->lineitems = new SmartSEO_Google_Service_DoubleClickBidManager_Lineitems_Resource(
        $this,
        $this->serviceName,
        'lineitems',
        array(
          'methods' => array(
            'downloadlineitems' => array(
              'path' => 'lineitems/downloadlineitems',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'uploadlineitems' => array(
              'path' => 'lineitems/uploadlineitems',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->queries = new SmartSEO_Google_Service_DoubleClickBidManager_Queries_Resource(
        $this,
        $this->serviceName,
        'queries',
        array(
          'methods' => array(
            'createquery' => array(
              'path' => 'query',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'deletequery' => array(
              'path' => 'query/{queryId}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'queryId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getquery' => array(
              'path' => 'query/{queryId}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'queryId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'listqueries' => array(
              'path' => 'queries',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),'runquery' => array(
              'path' => 'query/{queryId}',
              'httpMethod' => 'POST',
              'parameters' => array(
                'queryId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->reports = new SmartSEO_Google_Service_DoubleClickBidManager_Reports_Resource(
        $this,
        $this->serviceName,
        'reports',
        array(
          'methods' => array(
            'listreports' => array(
              'path' => 'queries/{queryId}/reports',
              'httpMethod' => 'GET',
              'parameters' => array(
                'queryId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
  }
}


/**
 * The "lineitems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclickbidmanagerService = new SmartSEO_Google_Service_DoubleClickBidManager(...);
 *   $lineitems = $doubleclickbidmanagerService->lineitems;
 *  </code>
 */
class SmartSEO_Google_Service_DoubleClickBidManager_Lineitems_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Retrieves line items in CSV format. (lineitems.downloadlineitems)
   *
   * @param SmartSEO_Google_DownloadLineItemsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_DoubleClickBidManager_DownloadLineItemsResponse
   */
  public function downloadlineitems(SmartSEO_Google_Service_DoubleClickBidManager_DownloadLineItemsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('downloadlineitems', array($params), "SmartSEO_Google_Service_DoubleClickBidManager_DownloadLineItemsResponse");
  }
  /**
   * Uploads line items in CSV format. (lineitems.uploadlineitems)
   *
   * @param SmartSEO_Google_UploadLineItemsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_DoubleClickBidManager_UploadLineItemsResponse
   */
  public function uploadlineitems(SmartSEO_Google_Service_DoubleClickBidManager_UploadLineItemsRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('uploadlineitems', array($params), "SmartSEO_Google_Service_DoubleClickBidManager_UploadLineItemsResponse");
  }
}

/**
 * The "queries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclickbidmanagerService = new SmartSEO_Google_Service_DoubleClickBidManager(...);
 *   $queries = $doubleclickbidmanagerService->queries;
 *  </code>
 */
class SmartSEO_Google_Service_DoubleClickBidManager_Queries_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Creates a query. (queries.createquery)
   *
   * @param SmartSEO_Google_Query $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_DoubleClickBidManager_Query
   */
  public function createquery(SmartSEO_Google_Service_DoubleClickBidManager_Query $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createquery', array($params), "SmartSEO_Google_Service_DoubleClickBidManager_Query");
  }
  /**
   * Deletes a stored query as well as the associated stored reports.
   * (queries.deletequery)
   *
   * @param string $queryId
   * Query ID to delete.
   * @param array $optParams Optional parameters.
   */
  public function deletequery($queryId, $optParams = array())
  {
    $params = array('queryId' => $queryId);
    $params = array_merge($params, $optParams);
    return $this->call('deletequery', array($params));
  }
  /**
   * Retrieves a stored query. (queries.getquery)
   *
   * @param string $queryId
   * Query ID to retrieve.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_DoubleClickBidManager_Query
   */
  public function getquery($queryId, $optParams = array())
  {
    $params = array('queryId' => $queryId);
    $params = array_merge($params, $optParams);
    return $this->call('getquery', array($params), "SmartSEO_Google_Service_DoubleClickBidManager_Query");
  }
  /**
   * Retrieves stored queries. (queries.listqueries)
   *
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_DoubleClickBidManager_ListQueriesResponse
   */
  public function listqueries($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('listqueries', array($params), "SmartSEO_Google_Service_DoubleClickBidManager_ListQueriesResponse");
  }
  /**
   * Runs a stored query to generate a report. (queries.runquery)
   *
   * @param string $queryId
   * Query ID to run.
   * @param SmartSEO_Google_RunQueryRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function runquery($queryId, SmartSEO_Google_Service_DoubleClickBidManager_RunQueryRequest $postBody, $optParams = array())
  {
    $params = array('queryId' => $queryId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('runquery', array($params));
  }
}

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclickbidmanagerService = new SmartSEO_Google_Service_DoubleClickBidManager(...);
 *   $reports = $doubleclickbidmanagerService->reports;
 *  </code>
 */
class SmartSEO_Google_Service_DoubleClickBidManager_Reports_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Retrieves stored reports. (reports.listreports)
   *
   * @param string $queryId
   * Query ID with which the reports are associated.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_DoubleClickBidManager_ListReportsResponse
   */
  public function listreports($queryId, $optParams = array())
  {
    $params = array('queryId' => $queryId);
    $params = array_merge($params, $optParams);
    return $this->call('listreports', array($params), "SmartSEO_Google_Service_DoubleClickBidManager_ListReportsResponse");
  }
}




class SmartSEO_Google_Service_DoubleClickBidManager_DownloadLineItemsRequest extends SmartSEO_Google_Collection
{
  public $filterIds;
  public $filterType;
  public $format;

  public function setFilterIds($filterIds)
  {
    $this->filterIds = $filterIds;
  }

  public function getFilterIds()
  {
    return $this->filterIds;
  }

  public function setFilterType($filterType)
  {
    $this->filterType = $filterType;
  }

  public function getFilterType()
  {
    return $this->filterType;
  }

  public function setFormat($format)
  {
    $this->format = $format;
  }

  public function getFormat()
  {
    return $this->format;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_DownloadLineItemsResponse extends SmartSEO_Google_Model
{
  public $lineItems;

  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }

  public function getLineItems()
  {
    return $this->lineItems;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_FilterPair extends SmartSEO_Google_Model
{
  public $type;
  public $value;

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getType()
  {
    return $this->type;
  }

  public function setValue($value)
  {
    $this->value = $value;
  }

  public function getValue()
  {
    return $this->value;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_ListQueriesResponse extends SmartSEO_Google_Collection
{
  public $kind;
  protected $queriesType = 'SmartSEO_Google_Service_DoubleClickBidManager_Query';
  protected $queriesDataType = 'array';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setQueries($queries)
  {
    $this->queries = $queries;
  }

  public function getQueries()
  {
    return $this->queries;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_ListReportsResponse extends SmartSEO_Google_Collection
{
  public $kind;
  protected $reportsType = 'SmartSEO_Google_Service_DoubleClickBidManager_Report';
  protected $reportsDataType = 'array';

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setReports($reports)
  {
    $this->reports = $reports;
  }

  public function getReports()
  {
    return $this->reports;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_Parameters extends SmartSEO_Google_Collection
{
  protected $filtersType = 'SmartSEO_Google_Service_DoubleClickBidManager_FilterPair';
  protected $filtersDataType = 'array';
  public $groupBys;
  public $includeInviteData;
  public $metrics;
  public $type;

  public function setFilters($filters)
  {
    $this->filters = $filters;
  }

  public function getFilters()
  {
    return $this->filters;
  }

  public function setGroupBys($groupBys)
  {
    $this->groupBys = $groupBys;
  }

  public function getGroupBys()
  {
    return $this->groupBys;
  }

  public function setIncludeInviteData($includeInviteData)
  {
    $this->includeInviteData = $includeInviteData;
  }

  public function getIncludeInviteData()
  {
    return $this->includeInviteData;
  }

  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }

  public function getMetrics()
  {
    return $this->metrics;
  }

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getType()
  {
    return $this->type;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_Query extends SmartSEO_Google_Model
{
  public $kind;
  protected $metadataType = 'SmartSEO_Google_Service_DoubleClickBidManager_QueryMetadata';
  protected $metadataDataType = '';
  protected $paramsType = 'SmartSEO_Google_Service_DoubleClickBidManager_Parameters';
  protected $paramsDataType = '';
  public $queryId;
  public $reportDataEndTimeMs;
  public $reportDataStartTimeMs;
  protected $scheduleType = 'SmartSEO_Google_Service_DoubleClickBidManager_QuerySchedule';
  protected $scheduleDataType = '';
  public $timezoneCode;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setMetadata(SmartSEO_Google_Service_DoubleClickBidManager_QueryMetadata $metadata)
  {
    $this->metadata = $metadata;
  }

  public function getMetadata()
  {
    return $this->metadata;
  }

  public function setParams(SmartSEO_Google_Service_DoubleClickBidManager_Parameters $params)
  {
    $this->params = $params;
  }

  public function getParams()
  {
    return $this->params;
  }

  public function setQueryId($queryId)
  {
    $this->queryId = $queryId;
  }

  public function getQueryId()
  {
    return $this->queryId;
  }

  public function setReportDataEndTimeMs($reportDataEndTimeMs)
  {
    $this->reportDataEndTimeMs = $reportDataEndTimeMs;
  }

  public function getReportDataEndTimeMs()
  {
    return $this->reportDataEndTimeMs;
  }

  public function setReportDataStartTimeMs($reportDataStartTimeMs)
  {
    $this->reportDataStartTimeMs = $reportDataStartTimeMs;
  }

  public function getReportDataStartTimeMs()
  {
    return $this->reportDataStartTimeMs;
  }

  public function setSchedule(SmartSEO_Google_Service_DoubleClickBidManager_QuerySchedule $schedule)
  {
    $this->schedule = $schedule;
  }

  public function getSchedule()
  {
    return $this->schedule;
  }

  public function setTimezoneCode($timezoneCode)
  {
    $this->timezoneCode = $timezoneCode;
  }

  public function getTimezoneCode()
  {
    return $this->timezoneCode;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_QueryMetadata extends SmartSEO_Google_Collection
{
  public $dataRange;
  public $format;
  public $googleCloudStoragePathForLatestReport;
  public $googleDrivePathForLatestReport;
  public $latestReportRunTimeMs;
  public $reportCount;
  public $running;
  public $sendNotification;
  public $shareEmailAddress;
  public $title;

  public function setDataRange($dataRange)
  {
    $this->dataRange = $dataRange;
  }

  public function getDataRange()
  {
    return $this->dataRange;
  }

  public function setFormat($format)
  {
    $this->format = $format;
  }

  public function getFormat()
  {
    return $this->format;
  }

  public function setGoogleCloudStoragePathForLatestReport($googleCloudStoragePathForLatestReport)
  {
    $this->googleCloudStoragePathForLatestReport = $googleCloudStoragePathForLatestReport;
  }

  public function getGoogleCloudStoragePathForLatestReport()
  {
    return $this->googleCloudStoragePathForLatestReport;
  }

  public function setGoogleDrivePathForLatestReport($googleDrivePathForLatestReport)
  {
    $this->googleDrivePathForLatestReport = $googleDrivePathForLatestReport;
  }

  public function getGoogleDrivePathForLatestReport()
  {
    return $this->googleDrivePathForLatestReport;
  }

  public function setLatestReportRunTimeMs($latestReportRunTimeMs)
  {
    $this->latestReportRunTimeMs = $latestReportRunTimeMs;
  }

  public function getLatestReportRunTimeMs()
  {
    return $this->latestReportRunTimeMs;
  }

  public function setReportCount($reportCount)
  {
    $this->reportCount = $reportCount;
  }

  public function getReportCount()
  {
    return $this->reportCount;
  }

  public function setRunning($running)
  {
    $this->running = $running;
  }

  public function getRunning()
  {
    return $this->running;
  }

  public function setSendNotification($sendNotification)
  {
    $this->sendNotification = $sendNotification;
  }

  public function getSendNotification()
  {
    return $this->sendNotification;
  }

  public function setShareEmailAddress($shareEmailAddress)
  {
    $this->shareEmailAddress = $shareEmailAddress;
  }

  public function getShareEmailAddress()
  {
    return $this->shareEmailAddress;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function getTitle()
  {
    return $this->title;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_QuerySchedule extends SmartSEO_Google_Model
{
  public $endTimeMs;
  public $frequency;
  public $nextRunMinuteOfDay;
  public $nextRunTimezoneCode;

  public function setEndTimeMs($endTimeMs)
  {
    $this->endTimeMs = $endTimeMs;
  }

  public function getEndTimeMs()
  {
    return $this->endTimeMs;
  }

  public function setFrequency($frequency)
  {
    $this->frequency = $frequency;
  }

  public function getFrequency()
  {
    return $this->frequency;
  }

  public function setNextRunMinuteOfDay($nextRunMinuteOfDay)
  {
    $this->nextRunMinuteOfDay = $nextRunMinuteOfDay;
  }

  public function getNextRunMinuteOfDay()
  {
    return $this->nextRunMinuteOfDay;
  }

  public function setNextRunTimezoneCode($nextRunTimezoneCode)
  {
    $this->nextRunTimezoneCode = $nextRunTimezoneCode;
  }

  public function getNextRunTimezoneCode()
  {
    return $this->nextRunTimezoneCode;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_Report extends SmartSEO_Google_Model
{
  protected $keyType = 'SmartSEO_Google_Service_DoubleClickBidManager_ReportKey';
  protected $keyDataType = '';
  protected $metadataType = 'SmartSEO_Google_Service_DoubleClickBidManager_ReportMetadata';
  protected $metadataDataType = '';
  protected $paramsType = 'SmartSEO_Google_Service_DoubleClickBidManager_Parameters';
  protected $paramsDataType = '';

  public function setKey(SmartSEO_Google_Service_DoubleClickBidManager_ReportKey $key)
  {
    $this->key = $key;
  }

  public function getKey()
  {
    return $this->key;
  }

  public function setMetadata(SmartSEO_Google_Service_DoubleClickBidManager_ReportMetadata $metadata)
  {
    $this->metadata = $metadata;
  }

  public function getMetadata()
  {
    return $this->metadata;
  }

  public function setParams(SmartSEO_Google_Service_DoubleClickBidManager_Parameters $params)
  {
    $this->params = $params;
  }

  public function getParams()
  {
    return $this->params;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_ReportFailure extends SmartSEO_Google_Model
{
  public $errorCode;

  public function setErrorCode($errorCode)
  {
    $this->errorCode = $errorCode;
  }

  public function getErrorCode()
  {
    return $this->errorCode;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_ReportKey extends SmartSEO_Google_Model
{
  public $queryId;
  public $reportId;

  public function setQueryId($queryId)
  {
    $this->queryId = $queryId;
  }

  public function getQueryId()
  {
    return $this->queryId;
  }

  public function setReportId($reportId)
  {
    $this->reportId = $reportId;
  }

  public function getReportId()
  {
    return $this->reportId;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_ReportMetadata extends SmartSEO_Google_Model
{
  public $googleCloudStoragePath;
  public $reportDataEndTimeMs;
  public $reportDataStartTimeMs;
  protected $statusType = 'SmartSEO_Google_Service_DoubleClickBidManager_ReportStatus';
  protected $statusDataType = '';

  public function setGoogleCloudStoragePath($googleCloudStoragePath)
  {
    $this->googleCloudStoragePath = $googleCloudStoragePath;
  }

  public function getGoogleCloudStoragePath()
  {
    return $this->googleCloudStoragePath;
  }

  public function setReportDataEndTimeMs($reportDataEndTimeMs)
  {
    $this->reportDataEndTimeMs = $reportDataEndTimeMs;
  }

  public function getReportDataEndTimeMs()
  {
    return $this->reportDataEndTimeMs;
  }

  public function setReportDataStartTimeMs($reportDataStartTimeMs)
  {
    $this->reportDataStartTimeMs = $reportDataStartTimeMs;
  }

  public function getReportDataStartTimeMs()
  {
    return $this->reportDataStartTimeMs;
  }

  public function setStatus(SmartSEO_Google_Service_DoubleClickBidManager_ReportStatus $status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_ReportStatus extends SmartSEO_Google_Model
{
  protected $failureType = 'SmartSEO_Google_Service_DoubleClickBidManager_ReportFailure';
  protected $failureDataType = '';
  public $finishTimeMs;
  public $format;
  public $state;

  public function setFailure(SmartSEO_Google_Service_DoubleClickBidManager_ReportFailure $failure)
  {
    $this->failure = $failure;
  }

  public function getFailure()
  {
    return $this->failure;
  }

  public function setFinishTimeMs($finishTimeMs)
  {
    $this->finishTimeMs = $finishTimeMs;
  }

  public function getFinishTimeMs()
  {
    return $this->finishTimeMs;
  }

  public function setFormat($format)
  {
    $this->format = $format;
  }

  public function getFormat()
  {
    return $this->format;
  }

  public function setState($state)
  {
    $this->state = $state;
  }

  public function getState()
  {
    return $this->state;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_RowStatus extends SmartSEO_Google_Collection
{
  public $changed;
  public $entityId;
  public $entityName;
  public $errors;
  public $persisted;
  public $rowNumber;

  public function setChanged($changed)
  {
    $this->changed = $changed;
  }

  public function getChanged()
  {
    return $this->changed;
  }

  public function setEntityId($entityId)
  {
    $this->entityId = $entityId;
  }

  public function getEntityId()
  {
    return $this->entityId;
  }

  public function setEntityName($entityName)
  {
    $this->entityName = $entityName;
  }

  public function getEntityName()
  {
    return $this->entityName;
  }

  public function setErrors($errors)
  {
    $this->errors = $errors;
  }

  public function getErrors()
  {
    return $this->errors;
  }

  public function setPersisted($persisted)
  {
    $this->persisted = $persisted;
  }

  public function getPersisted()
  {
    return $this->persisted;
  }

  public function setRowNumber($rowNumber)
  {
    $this->rowNumber = $rowNumber;
  }

  public function getRowNumber()
  {
    return $this->rowNumber;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_RunQueryRequest extends SmartSEO_Google_Model
{
  public $dataRange;
  public $reportDataEndTimeMs;
  public $reportDataStartTimeMs;
  public $timezoneCode;

  public function setDataRange($dataRange)
  {
    $this->dataRange = $dataRange;
  }

  public function getDataRange()
  {
    return $this->dataRange;
  }

  public function setReportDataEndTimeMs($reportDataEndTimeMs)
  {
    $this->reportDataEndTimeMs = $reportDataEndTimeMs;
  }

  public function getReportDataEndTimeMs()
  {
    return $this->reportDataEndTimeMs;
  }

  public function setReportDataStartTimeMs($reportDataStartTimeMs)
  {
    $this->reportDataStartTimeMs = $reportDataStartTimeMs;
  }

  public function getReportDataStartTimeMs()
  {
    return $this->reportDataStartTimeMs;
  }

  public function setTimezoneCode($timezoneCode)
  {
    $this->timezoneCode = $timezoneCode;
  }

  public function getTimezoneCode()
  {
    return $this->timezoneCode;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_UploadLineItemsRequest extends SmartSEO_Google_Model
{
  public $dryRun;
  public $format;
  public $lineItems;

  public function setDryRun($dryRun)
  {
    $this->dryRun = $dryRun;
  }

  public function getDryRun()
  {
    return $this->dryRun;
  }

  public function setFormat($format)
  {
    $this->format = $format;
  }

  public function getFormat()
  {
    return $this->format;
  }

  public function setLineItems($lineItems)
  {
    $this->lineItems = $lineItems;
  }

  public function getLineItems()
  {
    return $this->lineItems;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_UploadLineItemsResponse extends SmartSEO_Google_Model
{
  protected $uploadStatusType = 'SmartSEO_Google_Service_DoubleClickBidManager_UploadStatus';
  protected $uploadStatusDataType = '';

  public function setUploadStatus(SmartSEO_Google_Service_DoubleClickBidManager_UploadStatus $uploadStatus)
  {
    $this->uploadStatus = $uploadStatus;
  }

  public function getUploadStatus()
  {
    return $this->uploadStatus;
  }
}

class SmartSEO_Google_Service_DoubleClickBidManager_UploadStatus extends SmartSEO_Google_Collection
{
  public $errors;
  protected $rowStatusType = 'SmartSEO_Google_Service_DoubleClickBidManager_RowStatus';
  protected $rowStatusDataType = 'array';

  public function setErrors($errors)
  {
    $this->errors = $errors;
  }

  public function getErrors()
  {
    return $this->errors;
  }

  public function setRowStatus($rowStatus)
  {
    $this->rowStatus = $rowStatus;
  }

  public function getRowStatus()
  {
    return $this->rowStatus;
  }
}
