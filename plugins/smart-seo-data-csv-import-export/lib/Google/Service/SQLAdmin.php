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
 * Service definition for SQLAdmin (v1beta3).
 *
 * <p>
 * API for Cloud SQL database instance management.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/cloud-sql/docs/admin-api/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class SmartSEO_Google_Service_SQLAdmin extends SmartSEO_Google_Service
{
  /** View and manage your data across Google Cloud Platform services. */
  const CLOUD_PLATFORM = "https://www.googleapis.com/auth/cloud-platform";
  /** Manage your Google SQL Service instances. */
  const SQLSERVICE_ADMIN = "https://www.googleapis.com/auth/sqlservice.admin";

  public $backupRuns;
  public $flags;
  public $instances;
  public $operations;
  public $sslCerts;
  public $tiers;
  

  /**
   * Constructs the internal representation of the SQLAdmin service.
   *
   * @param SmartSEO_Google_Client $client
   */
  public function __construct(SmartSEO_Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'sql/v1beta3/';
    $this->version = 'v1beta3';
    $this->serviceName = 'sqladmin';

    $this->backupRuns = new SmartSEO_Google_Service_SQLAdmin_BackupRuns_Resource(
        $this,
        $this->serviceName,
        'backupRuns',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'projects/{project}/instances/{instance}/backupRuns/{backupConfiguration}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'backupConfiguration' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'dueTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'projects/{project}/instances/{instance}/backupRuns',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'backupConfiguration' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
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
    $this->flags = new SmartSEO_Google_Service_SQLAdmin_Flags_Resource(
        $this,
        $this->serviceName,
        'flags',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'flags',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->instances = new SmartSEO_Google_Service_SQLAdmin_Instances_Resource(
        $this,
        $this->serviceName,
        'instances',
        array(
          'methods' => array(
            'clone' => array(
              'path' => 'projects/{project}/instances/clone',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => 'projects/{project}/instances/{instance}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'export' => array(
              'path' => 'projects/{project}/instances/{instance}/export',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'projects/{project}/instances/{instance}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'import' => array(
              'path' => 'projects/{project}/instances/{instance}/import',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'projects/{project}/instances',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'projects/{project}/instances',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
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
              'path' => 'projects/{project}/instances/{instance}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'resetSslConfig' => array(
              'path' => 'projects/{project}/instances/{instance}/resetSslConfig',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'restart' => array(
              'path' => 'projects/{project}/instances/{instance}/restart',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'restoreBackup' => array(
              'path' => 'projects/{project}/instances/{instance}/restoreBackup',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'backupConfiguration' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'dueTime' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setRootPassword' => array(
              'path' => 'projects/{project}/instances/{instance}/setRootPassword',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => 'projects/{project}/instances/{instance}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->operations = new SmartSEO_Google_Service_SQLAdmin_Operations_Resource(
        $this,
        $this->serviceName,
        'operations',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'projects/{project}/instances/{instance}/operations/{operation}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
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
              'path' => 'projects/{project}/instances/{instance}/operations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->sslCerts = new SmartSEO_Google_Service_SQLAdmin_SslCerts_Resource(
        $this,
        $this->serviceName,
        'sslCerts',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'projects/{project}/instances/{instance}/sslCerts/{sha1Fingerprint}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sha1Fingerprint' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'projects/{project}/instances/{instance}/sslCerts/{sha1Fingerprint}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'sha1Fingerprint' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => 'projects/{project}/instances/{instance}/sslCerts',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'projects/{project}/instances/{instance}/sslCerts',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->tiers = new SmartSEO_Google_Service_SQLAdmin_Tiers_Resource(
        $this,
        $this->serviceName,
        'tiers',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'projects/{project}/tiers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
 * The "backupRuns" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new SmartSEO_Google_Service_SQLAdmin(...);
 *   $backupRuns = $sqladminService->backupRuns;
 *  </code>
 */
class SmartSEO_Google_Service_SQLAdmin_BackupRuns_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Retrieves a resource containing information about a backup run.
   * (backupRuns.get)
   *
   * @param string $project
   * Project ID of the project that contains the instance.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param string $backupConfiguration
   * Identifier for the backup configuration. This gets generated automatically when a backup
    * configuration is created.
   * @param string $dueTime
   * The time when this run is due to start in RFC 3339 format, for example 2012-11-15T16:19:00.094Z.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_BackupRun
   */
  public function get($project, $instance, $backupConfiguration, $dueTime, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'backupConfiguration' => $backupConfiguration, 'dueTime' => $dueTime);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_SQLAdmin_BackupRun");
  }
  /**
   * Lists all backup runs associated with a given instance and configuration in
   * the reverse chronological order of the enqueued time.
   * (backupRuns.listBackupRuns)
   *
   * @param string $project
   * Project ID of the project that contains the instance.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param string $backupConfiguration
   * Identifier for the backup configuration. This gets generated automatically when a backup
    * configuration is created.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A previously-returned page token representing part of the larger set of results to view.
   * @opt_param int maxResults
   * Maximum number of backup runs per response.
   * @return SmartSEO_Google_Service_SQLAdmin_BackupRunsListResponse
   */
  public function listBackupRuns($project, $instance, $backupConfiguration, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'backupConfiguration' => $backupConfiguration);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_SQLAdmin_BackupRunsListResponse");
  }
}

/**
 * The "flags" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new SmartSEO_Google_Service_SQLAdmin(...);
 *   $flags = $sqladminService->flags;
 *  </code>
 */
class SmartSEO_Google_Service_SQLAdmin_Flags_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * List all available database flags for Google Cloud SQL instances.
   * (flags.listFlags)
   *
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_FlagsListResponse
   */
  public function listFlags($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_SQLAdmin_FlagsListResponse");
  }
}

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new SmartSEO_Google_Service_SQLAdmin(...);
 *   $instances = $sqladminService->instances;
 *  </code>
 */
class SmartSEO_Google_Service_SQLAdmin_Instances_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Creates a Cloud SQL instance as a clone of the source instance.
   * (instances.cloneInstances)
   *
   * @param string $project
   * Project ID of the source as well as the clone Cloud SQL instance.
   * @param SmartSEO_Google_InstancesCloneRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_InstancesCloneResponse
   */
  public function cloneInstances($project, SmartSEO_Google_Service_SQLAdmin_InstancesCloneRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('clone', array($params), "SmartSEO_Google_Service_SQLAdmin_InstancesCloneResponse");
  }
  /**
   * Deletes a Cloud SQL instance. (instances.delete)
   *
   * @param string $project
   * Project ID of the project that contains the instance to be deleted.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_InstancesDeleteResponse
   */
  public function delete($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_SQLAdmin_InstancesDeleteResponse");
  }
  /**
   * Exports data from a Cloud SQL instance to a Google Cloud Storage bucket as a
   * MySQL dump file. (instances.export)
   *
   * @param string $project
   * Project ID of the project that contains the instance to be exported.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param SmartSEO_Google_InstancesExportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_InstancesExportResponse
   */
  public function export($project, $instance, SmartSEO_Google_Service_SQLAdmin_InstancesExportRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('export', array($params), "SmartSEO_Google_Service_SQLAdmin_InstancesExportResponse");
  }
  /**
   * Retrieves a resource containing information about a Cloud SQL instance.
   * (instances.get)
   *
   * @param string $project
   * Project ID of the project that contains the instance.
   * @param string $instance
   * Database instance ID. This does not include the project ID.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_DatabaseInstance
   */
  public function get($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_SQLAdmin_DatabaseInstance");
  }
  /**
   * Imports data into a Cloud SQL instance from a MySQL dump file in Google Cloud
   * Storage. (instances.import)
   *
   * @param string $project
   * Project ID of the project that contains the instance.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param SmartSEO_Google_InstancesImportRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_InstancesImportResponse
   */
  public function import($project, $instance, SmartSEO_Google_Service_SQLAdmin_InstancesImportRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "SmartSEO_Google_Service_SQLAdmin_InstancesImportResponse");
  }
  /**
   * Creates a new Cloud SQL instance. (instances.insert)
   *
   * @param string $project
   * Project ID of the project to which the newly created Cloud SQL instances should belong.
   * @param SmartSEO_Google_DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_InstancesInsertResponse
   */
  public function insert($project, SmartSEO_Google_Service_SQLAdmin_DatabaseInstance $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_SQLAdmin_InstancesInsertResponse");
  }
  /**
   * Lists instances under a given project in the alphabetical order of the
   * instance name. (instances.listInstances)
   *
   * @param string $project
   * Project ID of the project for which to list Cloud SQL instances.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * A previously-returned page token representing part of the larger set of results to view.
   * @opt_param string maxResults
   * The maximum number of results to return per response.
   * @return SmartSEO_Google_Service_SQLAdmin_InstancesListResponse
   */
  public function listInstances($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_SQLAdmin_InstancesListResponse");
  }
  /**
   * Updates settings of a Cloud SQL instance. Caution: This is not a partial
   * update, so you must include values for all the settings that you want to
   * retain. For partial updates, use patch.. This method supports patch
   * semantics. (instances.patch)
   *
   * @param string $project
   * Project ID of the project that contains the instance.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param SmartSEO_Google_DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_InstancesUpdateResponse
   */
  public function patch($project, $instance, SmartSEO_Google_Service_SQLAdmin_DatabaseInstance $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "SmartSEO_Google_Service_SQLAdmin_InstancesUpdateResponse");
  }
  /**
   * Deletes all client certificates and generates a new server SSL certificate
   * for the instance. The changes will not take effect until the instance is
   * restarted. Existing instances without a server certificate will need to call
   * this once to set a server certificate. (instances.resetSslConfig)
   *
   * @param string $project
   * Project ID of the project that contains the instance.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_InstancesResetSslConfigResponse
   */
  public function resetSslConfig($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('resetSslConfig', array($params), "SmartSEO_Google_Service_SQLAdmin_InstancesResetSslConfigResponse");
  }
  /**
   * Restarts a Cloud SQL instance. (instances.restart)
   *
   * @param string $project
   * Project ID of the project that contains the instance to be restarted.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_InstancesRestartResponse
   */
  public function restart($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('restart', array($params), "SmartSEO_Google_Service_SQLAdmin_InstancesRestartResponse");
  }
  /**
   * Restores a backup of a Cloud SQL instance. (instances.restoreBackup)
   *
   * @param string $project
   * Project ID of the project that contains the instance.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param string $backupConfiguration
   * The identifier of the backup configuration. This gets generated automatically when a backup
    * configuration is created.
   * @param string $dueTime
   * The time when this run is due to start in RFC 3339 format, for example 2012-11-15T16:19:00.094Z.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_InstancesRestoreBackupResponse
   */
  public function restoreBackup($project, $instance, $backupConfiguration, $dueTime, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'backupConfiguration' => $backupConfiguration, 'dueTime' => $dueTime);
    $params = array_merge($params, $optParams);
    return $this->call('restoreBackup', array($params), "SmartSEO_Google_Service_SQLAdmin_InstancesRestoreBackupResponse");
  }
  /**
   * Sets the password for the root user. (instances.setRootPassword)
   *
   * @param string $project
   * Project ID of the project that contains the instance.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param SmartSEO_Google_InstanceSetRootPasswordRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_InstancesSetRootPasswordResponse
   */
  public function setRootPassword($project, $instance, SmartSEO_Google_Service_SQLAdmin_InstanceSetRootPasswordRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setRootPassword', array($params), "SmartSEO_Google_Service_SQLAdmin_InstancesSetRootPasswordResponse");
  }
  /**
   * Updates settings of a Cloud SQL instance. Caution: This is not a partial
   * update, so you must include values for all the settings that you want to
   * retain. For partial updates, use patch. (instances.update)
   *
   * @param string $project
   * Project ID of the project that contains the instance.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param SmartSEO_Google_DatabaseInstance $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_InstancesUpdateResponse
   */
  public function update($project, $instance, SmartSEO_Google_Service_SQLAdmin_DatabaseInstance $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "SmartSEO_Google_Service_SQLAdmin_InstancesUpdateResponse");
  }
}

/**
 * The "operations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new SmartSEO_Google_Service_SQLAdmin(...);
 *   $operations = $sqladminService->operations;
 *  </code>
 */
class SmartSEO_Google_Service_SQLAdmin_Operations_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Retrieves an instance operation that has been performed on an instance.
   * (operations.get)
   *
   * @param string $project
   * Project ID of the project that contains the instance.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param string $operation
   * Instance operation ID.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_InstanceOperation
   */
  public function get($project, $instance, $operation, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'operation' => $operation);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_SQLAdmin_InstanceOperation");
  }
  /**
   * Lists all instance operations that have been performed on the given Cloud SQL
   * instance in the reverse chronological order of the start time.
   * (operations.listOperations)
   *
   * @param string $project
   * Project ID of the project that contains the instance.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults
   * Maximum number of operations per response.
   * @opt_param string pageToken
   * A previously-returned page token representing part of the larger set of results to view.
   * @return SmartSEO_Google_Service_SQLAdmin_OperationsListResponse
   */
  public function listOperations($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_SQLAdmin_OperationsListResponse");
  }
}

/**
 * The "sslCerts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new SmartSEO_Google_Service_SQLAdmin(...);
 *   $sslCerts = $sqladminService->sslCerts;
 *  </code>
 */
class SmartSEO_Google_Service_SQLAdmin_SslCerts_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the SSL certificate. The change will not take effect until the
   * instance is restarted. (sslCerts.delete)
   *
   * @param string $project
   * Project ID of the project that contains the instance to be deleted.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param string $sha1Fingerprint
   * Sha1 FingerPrint.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_SslCertsDeleteResponse
   */
  public function delete($project, $instance, $sha1Fingerprint, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'sha1Fingerprint' => $sha1Fingerprint);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_SQLAdmin_SslCertsDeleteResponse");
  }
  /**
   * Retrieves a particular SSL certificate. Does not include the private key
   * (required for usage). The private key must be saved from the response to
   * initial creation. (sslCerts.get)
   *
   * @param string $project
   * Project ID of the project that contains the instance.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param string $sha1Fingerprint
   * Sha1 FingerPrint.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_SslCert
   */
  public function get($project, $instance, $sha1Fingerprint, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'sha1Fingerprint' => $sha1Fingerprint);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_SQLAdmin_SslCert");
  }
  /**
   * Creates an SSL certificate and returns it along with the private key and
   * server certificate authority. The new certificate will not be usable until
   * the instance is restarted. (sslCerts.insert)
   *
   * @param string $project
   * Project ID of the project to which the newly created Cloud SQL instances should belong.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param SmartSEO_Google_SslCertsInsertRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_SslCertsInsertResponse
   */
  public function insert($project, $instance, SmartSEO_Google_Service_SQLAdmin_SslCertsInsertRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_SQLAdmin_SslCertsInsertResponse");
  }
  /**
   * Lists all of the current SSL certificates for the instance.
   * (sslCerts.listSslCerts)
   *
   * @param string $project
   * Project ID of the project for which to list Cloud SQL instances.
   * @param string $instance
   * Cloud SQL instance ID. This does not include the project ID.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_SslCertsListResponse
   */
  public function listSslCerts($project, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_SQLAdmin_SslCertsListResponse");
  }
}

/**
 * The "tiers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new SmartSEO_Google_Service_SQLAdmin(...);
 *   $tiers = $sqladminService->tiers;
 *  </code>
 */
class SmartSEO_Google_Service_SQLAdmin_Tiers_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Lists all available service tiers for Google Cloud SQL, for example D1, D2.
   * For related information, see Pricing. (tiers.listTiers)
   *
   * @param string $project
   * Project ID of the project for which to list tiers.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_SQLAdmin_TiersListResponse
   */
  public function listTiers($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_SQLAdmin_TiersListResponse");
  }
}




class SmartSEO_Google_Service_SQLAdmin_BackupConfiguration extends SmartSEO_Google_Model
{
  public $binaryLogEnabled;
  public $enabled;
  public $id;
  public $kind;
  public $startTime;

  public function setBinaryLogEnabled($binaryLogEnabled)
  {
    $this->binaryLogEnabled = $binaryLogEnabled;
  }

  public function getBinaryLogEnabled()
  {
    return $this->binaryLogEnabled;
  }

  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }

  public function getEnabled()
  {
    return $this->enabled;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }

  public function getStartTime()
  {
    return $this->startTime;
  }
}

class SmartSEO_Google_Service_SQLAdmin_BackupRun extends SmartSEO_Google_Model
{
  public $backupConfiguration;
  public $dueTime;
  public $endTime;
  public $enqueuedTime;
  protected $errorType = 'SmartSEO_Google_Service_SQLAdmin_OperationError';
  protected $errorDataType = '';
  public $instance;
  public $kind;
  public $startTime;
  public $status;

  public function setBackupConfiguration($backupConfiguration)
  {
    $this->backupConfiguration = $backupConfiguration;
  }

  public function getBackupConfiguration()
  {
    return $this->backupConfiguration;
  }

  public function setDueTime($dueTime)
  {
    $this->dueTime = $dueTime;
  }

  public function getDueTime()
  {
    return $this->dueTime;
  }

  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }

  public function getEndTime()
  {
    return $this->endTime;
  }

  public function setEnqueuedTime($enqueuedTime)
  {
    $this->enqueuedTime = $enqueuedTime;
  }

  public function getEnqueuedTime()
  {
    return $this->enqueuedTime;
  }

  public function setError(SmartSEO_Google_Service_SQLAdmin_OperationError $error)
  {
    $this->error = $error;
  }

  public function getError()
  {
    return $this->error;
  }

  public function setInstance($instance)
  {
    $this->instance = $instance;
  }

  public function getInstance()
  {
    return $this->instance;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
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
}

class SmartSEO_Google_Service_SQLAdmin_BackupRunsListResponse extends SmartSEO_Google_Collection
{
  protected $itemsType = 'SmartSEO_Google_Service_SQLAdmin_BackupRun';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;

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
}

class SmartSEO_Google_Service_SQLAdmin_BinLogCoordinates extends SmartSEO_Google_Model
{
  public $binLogFileName;
  public $binLogPosition;
  public $kind;

  public function setBinLogFileName($binLogFileName)
  {
    $this->binLogFileName = $binLogFileName;
  }

  public function getBinLogFileName()
  {
    return $this->binLogFileName;
  }

  public function setBinLogPosition($binLogPosition)
  {
    $this->binLogPosition = $binLogPosition;
  }

  public function getBinLogPosition()
  {
    return $this->binLogPosition;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
}

class SmartSEO_Google_Service_SQLAdmin_CloneContext extends SmartSEO_Google_Model
{
  protected $binLogCoordinatesType = 'SmartSEO_Google_Service_SQLAdmin_BinLogCoordinates';
  protected $binLogCoordinatesDataType = '';
  public $destinationInstanceName;
  public $kind;
  public $sourceInstanceName;

  public function setBinLogCoordinates(SmartSEO_Google_Service_SQLAdmin_BinLogCoordinates $binLogCoordinates)
  {
    $this->binLogCoordinates = $binLogCoordinates;
  }

  public function getBinLogCoordinates()
  {
    return $this->binLogCoordinates;
  }

  public function setDestinationInstanceName($destinationInstanceName)
  {
    $this->destinationInstanceName = $destinationInstanceName;
  }

  public function getDestinationInstanceName()
  {
    return $this->destinationInstanceName;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setSourceInstanceName($sourceInstanceName)
  {
    $this->sourceInstanceName = $sourceInstanceName;
  }

  public function getSourceInstanceName()
  {
    return $this->sourceInstanceName;
  }
}

class SmartSEO_Google_Service_SQLAdmin_DatabaseFlags extends SmartSEO_Google_Model
{
  public $name;
  public $value;

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
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

class SmartSEO_Google_Service_SQLAdmin_DatabaseInstance extends SmartSEO_Google_Collection
{
  public $currentDiskSize;
  public $databaseVersion;
  public $etag;
  public $instance;
  protected $ipAddressesType = 'SmartSEO_Google_Service_SQLAdmin_IpMapping';
  protected $ipAddressesDataType = 'array';
  public $kind;
  public $maxDiskSize;
  public $project;
  public $region;
  protected $serverCaCertType = 'SmartSEO_Google_Service_SQLAdmin_SslCert';
  protected $serverCaCertDataType = '';
  protected $settingsType = 'SmartSEO_Google_Service_SQLAdmin_Settings';
  protected $settingsDataType = '';
  public $state;

  public function setCurrentDiskSize($currentDiskSize)
  {
    $this->currentDiskSize = $currentDiskSize;
  }

  public function getCurrentDiskSize()
  {
    return $this->currentDiskSize;
  }

  public function setDatabaseVersion($databaseVersion)
  {
    $this->databaseVersion = $databaseVersion;
  }

  public function getDatabaseVersion()
  {
    return $this->databaseVersion;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setInstance($instance)
  {
    $this->instance = $instance;
  }

  public function getInstance()
  {
    return $this->instance;
  }

  public function setIpAddresses($ipAddresses)
  {
    $this->ipAddresses = $ipAddresses;
  }

  public function getIpAddresses()
  {
    return $this->ipAddresses;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setMaxDiskSize($maxDiskSize)
  {
    $this->maxDiskSize = $maxDiskSize;
  }

  public function getMaxDiskSize()
  {
    return $this->maxDiskSize;
  }

  public function setProject($project)
  {
    $this->project = $project;
  }

  public function getProject()
  {
    return $this->project;
  }

  public function setRegion($region)
  {
    $this->region = $region;
  }

  public function getRegion()
  {
    return $this->region;
  }

  public function setServerCaCert(SmartSEO_Google_Service_SQLAdmin_SslCert $serverCaCert)
  {
    $this->serverCaCert = $serverCaCert;
  }

  public function getServerCaCert()
  {
    return $this->serverCaCert;
  }

  public function setSettings(SmartSEO_Google_Service_SQLAdmin_Settings $settings)
  {
    $this->settings = $settings;
  }

  public function getSettings()
  {
    return $this->settings;
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

class SmartSEO_Google_Service_SQLAdmin_ExportContext extends SmartSEO_Google_Collection
{
  public $database;
  public $kind;
  public $table;
  public $uri;

  public function setDatabase($database)
  {
    $this->database = $database;
  }

  public function getDatabase()
  {
    return $this->database;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setTable($table)
  {
    $this->table = $table;
  }

  public function getTable()
  {
    return $this->table;
  }

  public function setUri($uri)
  {
    $this->uri = $uri;
  }

  public function getUri()
  {
    return $this->uri;
  }
}

class SmartSEO_Google_Service_SQLAdmin_Flag extends SmartSEO_Google_Collection
{
  public $allowedStringValues;
  public $appliesTo;
  public $kind;
  public $maxValue;
  public $minValue;
  public $name;
  public $type;

  public function setAllowedStringValues($allowedStringValues)
  {
    $this->allowedStringValues = $allowedStringValues;
  }

  public function getAllowedStringValues()
  {
    return $this->allowedStringValues;
  }

  public function setAppliesTo($appliesTo)
  {
    $this->appliesTo = $appliesTo;
  }

  public function getAppliesTo()
  {
    return $this->appliesTo;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setMaxValue($maxValue)
  {
    $this->maxValue = $maxValue;
  }

  public function getMaxValue()
  {
    return $this->maxValue;
  }

  public function setMinValue($minValue)
  {
    $this->minValue = $minValue;
  }

  public function getMinValue()
  {
    return $this->minValue;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
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

class SmartSEO_Google_Service_SQLAdmin_FlagsListResponse extends SmartSEO_Google_Collection
{
  protected $itemsType = 'SmartSEO_Google_Service_SQLAdmin_Flag';
  protected $itemsDataType = 'array';
  public $kind;

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
}

class SmartSEO_Google_Service_SQLAdmin_ImportContext extends SmartSEO_Google_Collection
{
  public $database;
  public $kind;
  public $uri;

  public function setDatabase($database)
  {
    $this->database = $database;
  }

  public function getDatabase()
  {
    return $this->database;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setUri($uri)
  {
    $this->uri = $uri;
  }

  public function getUri()
  {
    return $this->uri;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstanceOperation extends SmartSEO_Google_Collection
{
  public $endTime;
  public $enqueuedTime;
  protected $errorType = 'SmartSEO_Google_Service_SQLAdmin_OperationError';
  protected $errorDataType = 'array';
  protected $exportContextType = 'SmartSEO_Google_Service_SQLAdmin_ExportContext';
  protected $exportContextDataType = '';
  protected $importContextType = 'SmartSEO_Google_Service_SQLAdmin_ImportContext';
  protected $importContextDataType = '';
  public $instance;
  public $kind;
  public $operation;
  public $operationType;
  public $startTime;
  public $state;
  public $userEmailAddress;

  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }

  public function getEndTime()
  {
    return $this->endTime;
  }

  public function setEnqueuedTime($enqueuedTime)
  {
    $this->enqueuedTime = $enqueuedTime;
  }

  public function getEnqueuedTime()
  {
    return $this->enqueuedTime;
  }

  public function setError($error)
  {
    $this->error = $error;
  }

  public function getError()
  {
    return $this->error;
  }

  public function setExportContext(SmartSEO_Google_Service_SQLAdmin_ExportContext $exportContext)
  {
    $this->exportContext = $exportContext;
  }

  public function getExportContext()
  {
    return $this->exportContext;
  }

  public function setImportContext(SmartSEO_Google_Service_SQLAdmin_ImportContext $importContext)
  {
    $this->importContext = $importContext;
  }

  public function getImportContext()
  {
    return $this->importContext;
  }

  public function setInstance($instance)
  {
    $this->instance = $instance;
  }

  public function getInstance()
  {
    return $this->instance;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

  public function getOperation()
  {
    return $this->operation;
  }

  public function setOperationType($operationType)
  {
    $this->operationType = $operationType;
  }

  public function getOperationType()
  {
    return $this->operationType;
  }

  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }

  public function getStartTime()
  {
    return $this->startTime;
  }

  public function setState($state)
  {
    $this->state = $state;
  }

  public function getState()
  {
    return $this->state;
  }

  public function setUserEmailAddress($userEmailAddress)
  {
    $this->userEmailAddress = $userEmailAddress;
  }

  public function getUserEmailAddress()
  {
    return $this->userEmailAddress;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstanceSetRootPasswordRequest extends SmartSEO_Google_Model
{
  protected $setRootPasswordContextType = 'SmartSEO_Google_Service_SQLAdmin_SetRootPasswordContext';
  protected $setRootPasswordContextDataType = '';

  public function setSetRootPasswordContext(SmartSEO_Google_Service_SQLAdmin_SetRootPasswordContext $setRootPasswordContext)
  {
    $this->setRootPasswordContext = $setRootPasswordContext;
  }

  public function getSetRootPasswordContext()
  {
    return $this->setRootPasswordContext;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesCloneRequest extends SmartSEO_Google_Model
{
  protected $cloneContextType = 'SmartSEO_Google_Service_SQLAdmin_CloneContext';
  protected $cloneContextDataType = '';

  public function setCloneContext(SmartSEO_Google_Service_SQLAdmin_CloneContext $cloneContext)
  {
    $this->cloneContext = $cloneContext;
  }

  public function getCloneContext()
  {
    return $this->cloneContext;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesCloneResponse extends SmartSEO_Google_Model
{
  public $kind;
  public $operation;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

  public function getOperation()
  {
    return $this->operation;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesDeleteResponse extends SmartSEO_Google_Model
{
  public $kind;
  public $operation;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

  public function getOperation()
  {
    return $this->operation;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesExportRequest extends SmartSEO_Google_Model
{
  protected $exportContextType = 'SmartSEO_Google_Service_SQLAdmin_ExportContext';
  protected $exportContextDataType = '';

  public function setExportContext(SmartSEO_Google_Service_SQLAdmin_ExportContext $exportContext)
  {
    $this->exportContext = $exportContext;
  }

  public function getExportContext()
  {
    return $this->exportContext;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesExportResponse extends SmartSEO_Google_Model
{
  public $kind;
  public $operation;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

  public function getOperation()
  {
    return $this->operation;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesImportRequest extends SmartSEO_Google_Model
{
  protected $importContextType = 'SmartSEO_Google_Service_SQLAdmin_ImportContext';
  protected $importContextDataType = '';

  public function setImportContext(SmartSEO_Google_Service_SQLAdmin_ImportContext $importContext)
  {
    $this->importContext = $importContext;
  }

  public function getImportContext()
  {
    return $this->importContext;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesImportResponse extends SmartSEO_Google_Model
{
  public $kind;
  public $operation;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

  public function getOperation()
  {
    return $this->operation;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesInsertResponse extends SmartSEO_Google_Model
{
  public $kind;
  public $operation;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

  public function getOperation()
  {
    return $this->operation;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesListResponse extends SmartSEO_Google_Collection
{
  protected $itemsType = 'SmartSEO_Google_Service_SQLAdmin_DatabaseInstance';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;

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
}

class SmartSEO_Google_Service_SQLAdmin_InstancesResetSslConfigResponse extends SmartSEO_Google_Model
{
  public $kind;
  public $operation;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

  public function getOperation()
  {
    return $this->operation;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesRestartResponse extends SmartSEO_Google_Model
{
  public $kind;
  public $operation;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

  public function getOperation()
  {
    return $this->operation;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesRestoreBackupResponse extends SmartSEO_Google_Model
{
  public $kind;
  public $operation;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

  public function getOperation()
  {
    return $this->operation;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesSetRootPasswordResponse extends SmartSEO_Google_Model
{
  public $kind;
  public $operation;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

  public function getOperation()
  {
    return $this->operation;
  }
}

class SmartSEO_Google_Service_SQLAdmin_InstancesUpdateResponse extends SmartSEO_Google_Model
{
  public $kind;
  public $operation;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

  public function getOperation()
  {
    return $this->operation;
  }
}

class SmartSEO_Google_Service_SQLAdmin_IpConfiguration extends SmartSEO_Google_Collection
{
  public $authorizedNetworks;
  public $enabled;
  public $requireSsl;

  public function setAuthorizedNetworks($authorizedNetworks)
  {
    $this->authorizedNetworks = $authorizedNetworks;
  }

  public function getAuthorizedNetworks()
  {
    return $this->authorizedNetworks;
  }

  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }

  public function getEnabled()
  {
    return $this->enabled;
  }

  public function setRequireSsl($requireSsl)
  {
    $this->requireSsl = $requireSsl;
  }

  public function getRequireSsl()
  {
    return $this->requireSsl;
  }
}

class SmartSEO_Google_Service_SQLAdmin_IpMapping extends SmartSEO_Google_Model
{
  public $ipAddress;
  public $timeToRetire;

  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }

  public function getIpAddress()
  {
    return $this->ipAddress;
  }

  public function setTimeToRetire($timeToRetire)
  {
    $this->timeToRetire = $timeToRetire;
  }

  public function getTimeToRetire()
  {
    return $this->timeToRetire;
  }
}

class SmartSEO_Google_Service_SQLAdmin_LocationPreference extends SmartSEO_Google_Model
{
  public $followGaeApplication;
  public $kind;
  public $zone;

  public function setFollowGaeApplication($followGaeApplication)
  {
    $this->followGaeApplication = $followGaeApplication;
  }

  public function getFollowGaeApplication()
  {
    return $this->followGaeApplication;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
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

class SmartSEO_Google_Service_SQLAdmin_OperationError extends SmartSEO_Google_Model
{
  public $code;
  public $kind;

  public function setCode($code)
  {
    $this->code = $code;
  }

  public function getCode()
  {
    return $this->code;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }
}

class SmartSEO_Google_Service_SQLAdmin_OperationsListResponse extends SmartSEO_Google_Collection
{
  protected $itemsType = 'SmartSEO_Google_Service_SQLAdmin_InstanceOperation';
  protected $itemsDataType = 'array';
  public $kind;
  public $nextPageToken;

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
}

class SmartSEO_Google_Service_SQLAdmin_SetRootPasswordContext extends SmartSEO_Google_Model
{
  public $kind;
  public $password;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getPassword()
  {
    return $this->password;
  }
}

class SmartSEO_Google_Service_SQLAdmin_Settings extends SmartSEO_Google_Collection
{
  public $activationPolicy;
  public $authorizedGaeApplications;
  protected $backupConfigurationType = 'SmartSEO_Google_Service_SQLAdmin_BackupConfiguration';
  protected $backupConfigurationDataType = 'array';
  protected $databaseFlagsType = 'SmartSEO_Google_Service_SQLAdmin_DatabaseFlags';
  protected $databaseFlagsDataType = 'array';
  protected $ipConfigurationType = 'SmartSEO_Google_Service_SQLAdmin_IpConfiguration';
  protected $ipConfigurationDataType = '';
  public $kind;
  protected $locationPreferenceType = 'SmartSEO_Google_Service_SQLAdmin_LocationPreference';
  protected $locationPreferenceDataType = '';
  public $pricingPlan;
  public $replicationType;
  public $settingsVersion;
  public $tier;

  public function setActivationPolicy($activationPolicy)
  {
    $this->activationPolicy = $activationPolicy;
  }

  public function getActivationPolicy()
  {
    return $this->activationPolicy;
  }

  public function setAuthorizedGaeApplications($authorizedGaeApplications)
  {
    $this->authorizedGaeApplications = $authorizedGaeApplications;
  }

  public function getAuthorizedGaeApplications()
  {
    return $this->authorizedGaeApplications;
  }

  public function setBackupConfiguration($backupConfiguration)
  {
    $this->backupConfiguration = $backupConfiguration;
  }

  public function getBackupConfiguration()
  {
    return $this->backupConfiguration;
  }

  public function setDatabaseFlags($databaseFlags)
  {
    $this->databaseFlags = $databaseFlags;
  }

  public function getDatabaseFlags()
  {
    return $this->databaseFlags;
  }

  public function setIpConfiguration(SmartSEO_Google_Service_SQLAdmin_IpConfiguration $ipConfiguration)
  {
    $this->ipConfiguration = $ipConfiguration;
  }

  public function getIpConfiguration()
  {
    return $this->ipConfiguration;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLocationPreference(SmartSEO_Google_Service_SQLAdmin_LocationPreference $locationPreference)
  {
    $this->locationPreference = $locationPreference;
  }

  public function getLocationPreference()
  {
    return $this->locationPreference;
  }

  public function setPricingPlan($pricingPlan)
  {
    $this->pricingPlan = $pricingPlan;
  }

  public function getPricingPlan()
  {
    return $this->pricingPlan;
  }

  public function setReplicationType($replicationType)
  {
    $this->replicationType = $replicationType;
  }

  public function getReplicationType()
  {
    return $this->replicationType;
  }

  public function setSettingsVersion($settingsVersion)
  {
    $this->settingsVersion = $settingsVersion;
  }

  public function getSettingsVersion()
  {
    return $this->settingsVersion;
  }

  public function setTier($tier)
  {
    $this->tier = $tier;
  }

  public function getTier()
  {
    return $this->tier;
  }
}

class SmartSEO_Google_Service_SQLAdmin_SslCert extends SmartSEO_Google_Model
{
  public $cert;
  public $certSerialNumber;
  public $commonName;
  public $createTime;
  public $expirationTime;
  public $instance;
  public $kind;
  public $sha1Fingerprint;

  public function setCert($cert)
  {
    $this->cert = $cert;
  }

  public function getCert()
  {
    return $this->cert;
  }

  public function setCertSerialNumber($certSerialNumber)
  {
    $this->certSerialNumber = $certSerialNumber;
  }

  public function getCertSerialNumber()
  {
    return $this->certSerialNumber;
  }

  public function setCommonName($commonName)
  {
    $this->commonName = $commonName;
  }

  public function getCommonName()
  {
    return $this->commonName;
  }

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }

  public function getCreateTime()
  {
    return $this->createTime;
  }

  public function setExpirationTime($expirationTime)
  {
    $this->expirationTime = $expirationTime;
  }

  public function getExpirationTime()
  {
    return $this->expirationTime;
  }

  public function setInstance($instance)
  {
    $this->instance = $instance;
  }

  public function getInstance()
  {
    return $this->instance;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setSha1Fingerprint($sha1Fingerprint)
  {
    $this->sha1Fingerprint = $sha1Fingerprint;
  }

  public function getSha1Fingerprint()
  {
    return $this->sha1Fingerprint;
  }
}

class SmartSEO_Google_Service_SQLAdmin_SslCertDetail extends SmartSEO_Google_Model
{
  protected $certInfoType = 'SmartSEO_Google_Service_SQLAdmin_SslCert';
  protected $certInfoDataType = '';
  public $certPrivateKey;

  public function setCertInfo(SmartSEO_Google_Service_SQLAdmin_SslCert $certInfo)
  {
    $this->certInfo = $certInfo;
  }

  public function getCertInfo()
  {
    return $this->certInfo;
  }

  public function setCertPrivateKey($certPrivateKey)
  {
    $this->certPrivateKey = $certPrivateKey;
  }

  public function getCertPrivateKey()
  {
    return $this->certPrivateKey;
  }
}

class SmartSEO_Google_Service_SQLAdmin_SslCertsDeleteResponse extends SmartSEO_Google_Model
{
  public $kind;
  public $operation;

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setOperation($operation)
  {
    $this->operation = $operation;
  }

  public function getOperation()
  {
    return $this->operation;
  }
}

class SmartSEO_Google_Service_SQLAdmin_SslCertsInsertRequest extends SmartSEO_Google_Model
{
  public $commonName;

  public function setCommonName($commonName)
  {
    $this->commonName = $commonName;
  }

  public function getCommonName()
  {
    return $this->commonName;
  }
}

class SmartSEO_Google_Service_SQLAdmin_SslCertsInsertResponse extends SmartSEO_Google_Model
{
  protected $clientCertType = 'SmartSEO_Google_Service_SQLAdmin_SslCertDetail';
  protected $clientCertDataType = '';
  public $kind;
  protected $serverCaCertType = 'SmartSEO_Google_Service_SQLAdmin_SslCert';
  protected $serverCaCertDataType = '';

  public function setClientCert(SmartSEO_Google_Service_SQLAdmin_SslCertDetail $clientCert)
  {
    $this->clientCert = $clientCert;
  }

  public function getClientCert()
  {
    return $this->clientCert;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setServerCaCert(SmartSEO_Google_Service_SQLAdmin_SslCert $serverCaCert)
  {
    $this->serverCaCert = $serverCaCert;
  }

  public function getServerCaCert()
  {
    return $this->serverCaCert;
  }
}

class SmartSEO_Google_Service_SQLAdmin_SslCertsListResponse extends SmartSEO_Google_Collection
{
  protected $itemsType = 'SmartSEO_Google_Service_SQLAdmin_SslCert';
  protected $itemsDataType = 'array';
  public $kind;

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
}

class SmartSEO_Google_Service_SQLAdmin_Tier extends SmartSEO_Google_Collection
{
  public $diskQuota;
  public $rAM;
  public $kind;
  public $region;
  public $tier;

  public function setDiskQuota($diskQuota)
  {
    $this->diskQuota = $diskQuota;
  }

  public function getDiskQuota()
  {
    return $this->diskQuota;
  }

  public function setRAM($rAM)
  {
    $this->rAM = $rAM;
  }

  public function getRAM()
  {
    return $this->rAM;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setRegion($region)
  {
    $this->region = $region;
  }

  public function getRegion()
  {
    return $this->region;
  }

  public function setTier($tier)
  {
    $this->tier = $tier;
  }

  public function getTier()
  {
    return $this->tier;
  }
}

class SmartSEO_Google_Service_SQLAdmin_TiersListResponse extends SmartSEO_Google_Collection
{
  protected $itemsType = 'SmartSEO_Google_Service_SQLAdmin_Tier';
  protected $itemsDataType = 'array';
  public $kind;

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
}
