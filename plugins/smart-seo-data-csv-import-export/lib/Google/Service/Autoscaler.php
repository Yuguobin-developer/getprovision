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
 * Service definition for Autoscaler (v1beta2).
 *
 * <p>
 * The Google Compute Engine Autoscaler API provides autoscaling for groups of Cloud VMs.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="http://developers.google.com/compute/docs/autoscaler" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class SmartSEO_Google_Service_Autoscaler extends SmartSEO_Google_Service
{
  /** View and manage your Google Compute Engine resources. */
  const COMPUTE = "https://www.googleapis.com/auth/compute";
  /** View your Google Compute Engine resources. */
  const COMPUTE_READONLY = "https://www.googleapis.com/auth/compute.readonly";

  public $autoscalers;
  public $zoneOperations;
  

  /**
   * Constructs the internal representation of the Autoscaler service.
   *
   * @param SmartSEO_Google_Client $client
   */
  public function __construct(SmartSEO_Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'autoscaler/v1beta2/';
    $this->version = 'v1beta2';
    $this->serviceName = 'autoscaler';

    $this->autoscalers = new SmartSEO_Google_Service_Autoscaler_Autoscalers_Resource(
        $this,
        $this->serviceName,
        'autoscalers',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'projects/{project}/zones/{zone}/autoscalers/{autoscaler}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'autoscaler' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'projects/{project}/zones/{zone}/autoscalers/{autoscaler}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'autoscaler' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'projects/{project}/zones/{zone}/autoscalers',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'projects/{project}/zones/{zone}/autoscalers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),'patch' => array(
              'path' => 'projects/{project}/zones/{zone}/autoscalers/{autoscaler}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'autoscaler' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'projects/{project}/zones/{zone}/autoscalers/{autoscaler}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'autoscaler' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->zoneOperations = new SmartSEO_Google_Service_Autoscaler_ZoneOperations_Resource(
        $this,
        $this->serviceName,
        'zoneOperations',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/zones/{zone}/operations/{operation}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'operation' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/zones/{zone}/operations/{operation}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'operation' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/zones/{zone}/operations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'zone' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
              ),
            ),
          )
        )
    );
  }
}


/**
 * The "autoscalers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $autoscalerService = new SmartSEO_Google_Service_Autoscaler(...);
 *   $autoscalers = $autoscalerService->autoscalers;
 *  </code>
 */
class SmartSEO_Google_Service_Autoscaler_Autoscalers_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified Autoscaler resource. (autoscalers.delete)
   *
   * @param string $project
   * Project ID of Autoscaler resource.
   * @param string $zone
   * Zone name of Autoscaler resource.
   * @param string $autoscaler
   * Name of the Autoscaler resource.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Autoscaler_Operation
   */
  public function delete($project, $zone, $autoscaler, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'autoscaler' => $autoscaler);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Autoscaler_Operation");
  }
  /**
   * Gets the specified Autoscaler resource. (autoscalers.get)
   *
   * @param string $project
   * Project ID of Autoscaler resource.
   * @param string $zone
   * Zone name of Autoscaler resource.
   * @param string $autoscaler
   * Name of the Autoscaler resource.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Autoscaler_Autoscaler
   */
  public function get($project, $zone, $autoscaler, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'autoscaler' => $autoscaler);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Autoscaler_Autoscaler");
  }
  /**
   * Adds new Autoscaler resource. (autoscalers.insert)
   *
   * @param string $project
   * Project ID of Autoscaler resource.
   * @param string $zone
   * Zone name of Autoscaler resource.
   * @param SmartSEO_Google_Autoscaler $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Autoscaler_Operation
   */
  public function insert($project, $zone, SmartSEO_Google_Service_Autoscaler_Autoscaler $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Autoscaler_Operation");
  }
  /**
   * Lists all Autoscaler resources in this zone. (autoscalers.listAutoscalers)
   *
   * @param string $project
   * Project ID of Autoscaler resource.
   * @param string $zone
   * Zone name of Autoscaler resource.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   *
   * @opt_param string pageToken
   *
   * @opt_param string maxResults
   *
   * @return SmartSEO_Google_Service_Autoscaler_AutoscalerListResponse
   */
  public function listAutoscalers($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Autoscaler_AutoscalerListResponse");
  }
  /**
   * Update the entire content of the Autoscaler resource. This method supports
   * patch semantics. (autoscalers.patch)
   *
   * @param string $project
   * Project ID of Autoscaler resource.
   * @param string $zone
   * Zone name of Autoscaler resource.
   * @param string $autoscaler
   * Name of the Autoscaler resource.
   * @param SmartSEO_Google_Autoscaler $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Autoscaler_Operation
   */
  public function patch($project, $zone, $autoscaler, SmartSEO_Google_Service_Autoscaler_Autoscaler $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'autoscaler' => $autoscaler, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "SmartSEO_Google_Service_Autoscaler_Operation");
  }
  /**
   * Update the entire content of the Autoscaler resource. (autoscalers.update)
   *
   * @param string $project
   * Project ID of Autoscaler resource.
   * @param string $zone
   * Zone name of Autoscaler resource.
   * @param string $autoscaler
   * Name of the Autoscaler resource.
   * @param SmartSEO_Google_Autoscaler $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Autoscaler_Operation
   */
  public function update($project, $zone, $autoscaler, SmartSEO_Google_Service_Autoscaler_Autoscaler $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'autoscaler' => $autoscaler, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "SmartSEO_Google_Service_Autoscaler_Operation");
  }
}

/**
 * The "zoneOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $autoscalerService = new SmartSEO_Google_Service_Autoscaler(...);
 *   $zoneOperations = $autoscalerService->zoneOperations;
 *  </code>
 */
class SmartSEO_Google_Service_Autoscaler_ZoneOperations_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified zone-specific operation resource.
   * (zoneOperations.delete)
   *
   * @param string $project
   *
   * @param string $zone
   *
   * @param string $operation
   *
   * @param array $optParams Optional parameters.
   */
  public function delete($project, $zone, $operation, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'operation' => $operation);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves the specified zone-specific operation resource.
   * (zoneOperations.get)
   *
   * @param string $project
   *
   * @param string $zone
   *
   * @param string $operation
   *
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Autoscaler_Operation
   */
  public function get($project, $zone, $operation, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'operation' => $operation);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Autoscaler_Operation");
  }
  /**
   * Retrieves the list of operation resources contained within the specified
   * zone. (zoneOperations.listZoneOperations)
   *
   * @param string $project
   *
   * @param string $zone
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   *
   * @opt_param string pageToken
   *
   * @opt_param string maxResults
   *
   * @return SmartSEO_Google_Service_Autoscaler_OperationList
   */
  public function listZoneOperations($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Autoscaler_OperationList");
  }
}




class SmartSEO_Google_Service_Autoscaler_Autoscaler extends SmartSEO_Google_Model
{
  protected $autoscalingPolicyType = 'SmartSEO_Google_Service_Autoscaler_AutoscalingPolicy';
  protected $autoscalingPolicyDataType = '';
  public $creationTimestamp;
  public $description;
  public $id;
  public $name;
  public $selfLink;
  public $target;

  public function setAutoscalingPolicy(SmartSEO_Google_Service_Autoscaler_AutoscalingPolicy $autoscalingPolicy)
  {
    $this->autoscalingPolicy = $autoscalingPolicy;
  }

  public function getAutoscalingPolicy()
  {
    return $this->autoscalingPolicy;
  }

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }

  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setTarget($target)
  {
    $this->target = $target;
  }

  public function getTarget()
  {
    return $this->target;
  }
}

class SmartSEO_Google_Service_Autoscaler_AutoscalerListResponse extends SmartSEO_Google_Collection
{
  protected $itemsType = 'SmartSEO_Google_Service_Autoscaler_Autoscaler';
  protected $itemsDataType = 'array';
  public $nextPageToken;

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

class SmartSEO_Google_Service_Autoscaler_AutoscalingPolicy extends SmartSEO_Google_Model
{
  public $coolDownPeriodSec;
  protected $cpuUtilizationType = 'SmartSEO_Google_Service_Autoscaler_AutoscalingPolicyCpuUtilization';
  protected $cpuUtilizationDataType = '';
  public $maxNumReplicas;
  public $minNumReplicas;

  public function setCoolDownPeriodSec($coolDownPeriodSec)
  {
    $this->coolDownPeriodSec = $coolDownPeriodSec;
  }

  public function getCoolDownPeriodSec()
  {
    return $this->coolDownPeriodSec;
  }

  public function setCpuUtilization(SmartSEO_Google_Service_Autoscaler_AutoscalingPolicyCpuUtilization $cpuUtilization)
  {
    $this->cpuUtilization = $cpuUtilization;
  }

  public function getCpuUtilization()
  {
    return $this->cpuUtilization;
  }

  public function setMaxNumReplicas($maxNumReplicas)
  {
    $this->maxNumReplicas = $maxNumReplicas;
  }

  public function getMaxNumReplicas()
  {
    return $this->maxNumReplicas;
  }

  public function setMinNumReplicas($minNumReplicas)
  {
    $this->minNumReplicas = $minNumReplicas;
  }

  public function getMinNumReplicas()
  {
    return $this->minNumReplicas;
  }
}

class SmartSEO_Google_Service_Autoscaler_AutoscalingPolicyCpuUtilization extends SmartSEO_Google_Model
{
  public $utilizationTarget;

  public function setUtilizationTarget($utilizationTarget)
  {
    $this->utilizationTarget = $utilizationTarget;
  }

  public function getUtilizationTarget()
  {
    return $this->utilizationTarget;
  }
}

class SmartSEO_Google_Service_Autoscaler_Operation extends SmartSEO_Google_Collection
{
  public $clientOperationId;
  public $creationTimestamp;
  public $endTime;
  protected $errorType = 'SmartSEO_Google_Service_Autoscaler_OperationError';
  protected $errorDataType = '';
  public $httpErrorMessage;
  public $httpErrorStatusCode;
  public $id;
  public $insertTime;
  public $kind;
  public $name;
  public $operationType;
  public $progress;
  public $region;
  public $selfLink;
  public $startTime;
  public $status;
  public $statusMessage;
  public $targetId;
  public $targetLink;
  public $user;
  protected $warningsType = 'SmartSEO_Google_Service_Autoscaler_OperationWarnings';
  protected $warningsDataType = 'array';
  public $zone;

  public function setClientOperationId($clientOperationId)
  {
    $this->clientOperationId = $clientOperationId;
  }

  public function getClientOperationId()
  {
    return $this->clientOperationId;
  }

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }

  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }

  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }

  public function getEndTime()
  {
    return $this->endTime;
  }

  public function setError(SmartSEO_Google_Service_Autoscaler_OperationError $error)
  {
    $this->error = $error;
  }

  public function getError()
  {
    return $this->error;
  }

  public function setHttpErrorMessage($httpErrorMessage)
  {
    $this->httpErrorMessage = $httpErrorMessage;
  }

  public function getHttpErrorMessage()
  {
    return $this->httpErrorMessage;
  }

  public function setHttpErrorStatusCode($httpErrorStatusCode)
  {
    $this->httpErrorStatusCode = $httpErrorStatusCode;
  }

  public function getHttpErrorStatusCode()
  {
    return $this->httpErrorStatusCode;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setInsertTime($insertTime)
  {
    $this->insertTime = $insertTime;
  }

  public function getInsertTime()
  {
    return $this->insertTime;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }

  public function getOperationType()
  {
    return $this->operationType;
  }

  public function setProgress($progress)
  {
    $this->progress = $progress;
  }

  public function getProgress()
  {
    return $this->progress;
  }

  public function setRegion($region)
  {
    $this->region = $region;
  }

  public function getRegion()
  {
    return $this->region;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }

  public function getStartTime()
  {
    return $this->startTime;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setStatusMessage($statusMessage)
  {
    $this->statusMessage = $statusMessage;
  }

  public function getStatusMessage()
  {
    return $this->statusMessage;
  }

  public function setTargetId($targetId)
  {
    $this->targetId = $targetId;
  }

  public function getTargetId()
  {
    return $this->targetId;
  }

  public function setTargetLink($targetLink)
  {
    $this->targetLink = $targetLink;
  }

  public function getTargetLink()
  {
    return $this->targetLink;
  }

  public function setUser($user)
  {
    $this->user = $user;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }

  public function getWarnings()
  {
    return $this->warnings;
  }

  public function setZone($zone)
  {
    $this->zone = $zone;
  }

  public function getZone()
  {
    return $this->zone;
  }
}

class SmartSEO_Google_Service_Autoscaler_OperationError extends SmartSEO_Google_Collection
{
  protected $errorsType = 'SmartSEO_Google_Service_Autoscaler_OperationErrorErrors';
  protected $errorsDataType = 'array';

  public function setErrors($errors)
  {
    $this->errors = $errors;
  }

  public function getErrors()
  {
    return $this->errors;
  }
}

class SmartSEO_Google_Service_Autoscaler_OperationErrorErrors extends SmartSEO_Google_Model
{
  public $code;
  public $location;
  public $message;

  public function setCode($code)
  {
    $this->code = $code;
  }

  public function getCode()
  {
    return $this->code;
  }

  public function setLocation($location)
  {
    $this->location = $location;
  }

  public function getLocation()
  {
    return $this->location;
  }

  public function setMessage($message)
  {
    $this->message = $message;
  }

  public function getMessage()
  {
    return $this->message;
  }
}

class SmartSEO_Google_Service_Autoscaler_OperationList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Autoscaler_Operation';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;
  public $selfLink;

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }
}

class SmartSEO_Google_Service_Autoscaler_OperationWarnings extends SmartSEO_Google_Collection
{
  public $code;
  protected $dataType = 'SmartSEO_Google_Service_Autoscaler_OperationWarningsData';
  protected $dataDataType = 'array';
  public $message;

  public function setCode($code)
  {
    $this->code = $code;
  }

  public function getCode()
  {
    return $this->code;
  }

  public function setData($data)
  {
    $this->data = $data;
  }

  public function getData()
  {
    return $this->data;
  }

  public function setMessage($message)
  {
    $this->message = $message;
  }

  public function getMessage()
  {
    return $this->message;
  }
}

class SmartSEO_Google_Service_Autoscaler_OperationWarningsData extends SmartSEO_Google_Model
{
  public $key;
  public $value;

  public function setKey($key)
  {
    $this->key = $key;
  }

  public function getKey()
  {
    return $this->key;
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
