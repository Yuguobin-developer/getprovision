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
 * Service definition for Compute (v1).
 *
 * <p>
 * API for the Google Compute Engine service.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/compute/docs/reference/latest/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class SmartSEO_Google_Service_Compute extends SmartSEO_Google_Service
{
  /** View and manage your Google Compute Engine resources. */
  const COMPUTE = "https://www.googleapis.com/auth/compute";
  /** View your Google Compute Engine resources. */
  const COMPUTE_READONLY = "https://www.googleapis.com/auth/compute.readonly";
  /** Manage your data and permissions in Google Cloud Storage. */
  const DEVSTORAGE_FULL_CONTROL = "https://www.googleapis.com/auth/devstorage.full_control";
  /** View your data in Google Cloud Storage. */
  const DEVSTORAGE_READ_ONLY = "https://www.googleapis.com/auth/devstorage.read_only";
  /** Manage your data in Google Cloud Storage. */
  const DEVSTORAGE_READ_WRITE = "https://www.googleapis.com/auth/devstorage.read_write";

  public $addresses;
  public $backendServices;
  public $diskTypes;
  public $disks;
  public $firewalls;
  public $forwardingRules;
  public $globalAddresses;
  public $globalForwardingRules;
  public $globalOperations;
  public $httpHealthChecks;
  public $images;
  public $instances;
  public $licenses;
  public $machineTypes;
  public $networks;
  public $projects;
  public $regionOperations;
  public $regions;
  public $routes;
  public $snapshots;
  public $targetHttpProxies;
  public $targetInstances;
  public $targetPools;
  public $urlMaps;
  public $zoneOperations;
  public $zones;
  

  /**
   * Constructs the internal representation of the Compute service.
   *
   * @param SmartSEO_Google_Client $client
   */
  public function __construct(SmartSEO_Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'compute/v1/projects/';
    $this->version = 'v1';
    $this->serviceName = 'compute';

    $this->addresses = new SmartSEO_Google_Service_Compute_Addresses_Resource(
        $this,
        $this->serviceName,
        'addresses',
        array(
          'methods' => array(
            'aggregatedList' => array(
              'path' => '{project}/aggregated/addresses',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'delete' => array(
              'path' => '{project}/regions/{region}/addresses/{address}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'address' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/regions/{region}/addresses/{address}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'address' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/regions/{region}/addresses',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/regions/{region}/addresses',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
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
    $this->backendServices = new SmartSEO_Google_Service_Compute_BackendServices_Resource(
        $this,
        $this->serviceName,
        'backendServices',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/global/backendServices/{backendService}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'backendService' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/global/backendServices/{backendService}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'backendService' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getHealth' => array(
              'path' => '{project}/global/backendServices/{backendService}/getHealth',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'backendService' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/global/backendServices',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/global/backendServices',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
              'path' => '{project}/global/backendServices/{backendService}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'backendService' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => '{project}/global/backendServices/{backendService}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'backendService' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->diskTypes = new SmartSEO_Google_Service_Compute_DiskTypes_Resource(
        $this,
        $this->serviceName,
        'diskTypes',
        array(
          'methods' => array(
            'aggregatedList' => array(
              'path' => '{project}/aggregated/diskTypes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'get' => array(
              'path' => '{project}/zones/{zone}/diskTypes/{diskType}',
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
                'diskType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/zones/{zone}/diskTypes',
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
    $this->disks = new SmartSEO_Google_Service_Compute_Disks_Resource(
        $this,
        $this->serviceName,
        'disks',
        array(
          'methods' => array(
            'aggregatedList' => array(
              'path' => '{project}/aggregated/disks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'createSnapshot' => array(
              'path' => '{project}/zones/{zone}/disks/{disk}/createSnapshot',
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
                'disk' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => '{project}/zones/{zone}/disks/{disk}',
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
                'disk' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/zones/{zone}/disks/{disk}',
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
                'disk' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/zones/{zone}/disks',
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
                'sourceImage' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => '{project}/zones/{zone}/disks',
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
    $this->firewalls = new SmartSEO_Google_Service_Compute_Firewalls_Resource(
        $this,
        $this->serviceName,
        'firewalls',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/global/firewalls/{firewall}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'firewall' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/global/firewalls/{firewall}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'firewall' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/global/firewalls',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/global/firewalls',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
              'path' => '{project}/global/firewalls/{firewall}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'firewall' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => '{project}/global/firewalls/{firewall}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'firewall' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->forwardingRules = new SmartSEO_Google_Service_Compute_ForwardingRules_Resource(
        $this,
        $this->serviceName,
        'forwardingRules',
        array(
          'methods' => array(
            'aggregatedList' => array(
              'path' => '{project}/aggregated/forwardingRules',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'delete' => array(
              'path' => '{project}/regions/{region}/forwardingRules/{forwardingRule}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'forwardingRule' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/regions/{region}/forwardingRules/{forwardingRule}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'forwardingRule' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/regions/{region}/forwardingRules',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/regions/{region}/forwardingRules',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
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
            ),'setTarget' => array(
              'path' => '{project}/regions/{region}/forwardingRules/{forwardingRule}/setTarget',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'forwardingRule' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->globalAddresses = new SmartSEO_Google_Service_Compute_GlobalAddresses_Resource(
        $this,
        $this->serviceName,
        'globalAddresses',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/global/addresses/{address}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'address' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/global/addresses/{address}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'address' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/global/addresses',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/global/addresses',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
    $this->globalForwardingRules = new SmartSEO_Google_Service_Compute_GlobalForwardingRules_Resource(
        $this,
        $this->serviceName,
        'globalForwardingRules',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/global/forwardingRules/{forwardingRule}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'forwardingRule' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/global/forwardingRules/{forwardingRule}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'forwardingRule' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/global/forwardingRules',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/global/forwardingRules',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'setTarget' => array(
              'path' => '{project}/global/forwardingRules/{forwardingRule}/setTarget',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'forwardingRule' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->globalOperations = new SmartSEO_Google_Service_Compute_GlobalOperations_Resource(
        $this,
        $this->serviceName,
        'globalOperations',
        array(
          'methods' => array(
            'aggregatedList' => array(
              'path' => '{project}/aggregated/operations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'delete' => array(
              'path' => '{project}/global/operations/{operation}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
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
              'path' => '{project}/global/operations/{operation}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
              'path' => '{project}/global/operations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
    $this->httpHealthChecks = new SmartSEO_Google_Service_Compute_HttpHealthChecks_Resource(
        $this,
        $this->serviceName,
        'httpHealthChecks',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/global/httpHealthChecks/{httpHealthCheck}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'httpHealthCheck' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/global/httpHealthChecks/{httpHealthCheck}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'httpHealthCheck' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/global/httpHealthChecks',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/global/httpHealthChecks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
              'path' => '{project}/global/httpHealthChecks/{httpHealthCheck}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'httpHealthCheck' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => '{project}/global/httpHealthChecks/{httpHealthCheck}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'httpHealthCheck' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->images = new SmartSEO_Google_Service_Compute_Images_Resource(
        $this,
        $this->serviceName,
        'images',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/global/images/{image}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'image' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'deprecate' => array(
              'path' => '{project}/global/images/{image}/deprecate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'image' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/global/images/{image}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'image' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/global/images',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/global/images',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
    $this->instances = new SmartSEO_Google_Service_Compute_Instances_Resource(
        $this,
        $this->serviceName,
        'instances',
        array(
          'methods' => array(
            'addAccessConfig' => array(
              'path' => '{project}/zones/{zone}/instances/{instance}/addAccessConfig',
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
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'networkInterface' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'aggregatedList' => array(
              'path' => '{project}/aggregated/instances',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'attachDisk' => array(
              'path' => '{project}/zones/{zone}/instances/{instance}/attachDisk',
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
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'delete' => array(
              'path' => '{project}/zones/{zone}/instances/{instance}',
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
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'deleteAccessConfig' => array(
              'path' => '{project}/zones/{zone}/instances/{instance}/deleteAccessConfig',
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
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'accessConfig' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
                'networkInterface' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'detachDisk' => array(
              'path' => '{project}/zones/{zone}/instances/{instance}/detachDisk',
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
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'deviceName' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/zones/{zone}/instances/{instance}',
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
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getSerialPortOutput' => array(
              'path' => '{project}/zones/{zone}/instances/{instance}/serialPort',
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
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/zones/{zone}/instances',
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
              'path' => '{project}/zones/{zone}/instances',
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
            ),'reset' => array(
              'path' => '{project}/zones/{zone}/instances/{instance}/reset',
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
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setDiskAutoDelete' => array(
              'path' => '{project}/zones/{zone}/instances/{instance}/setDiskAutoDelete',
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
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'autoDelete' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                  'required' => true,
                ),
                'deviceName' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setMetadata' => array(
              'path' => '{project}/zones/{zone}/instances/{instance}/setMetadata',
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
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setScheduling' => array(
              'path' => '{project}/zones/{zone}/instances/{instance}/setScheduling',
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
                'instance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setTags' => array(
              'path' => '{project}/zones/{zone}/instances/{instance}/setTags',
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
    $this->licenses = new SmartSEO_Google_Service_Compute_Licenses_Resource(
        $this,
        $this->serviceName,
        'licenses',
        array(
          'methods' => array(
            'get' => array(
              'path' => '{project}/global/licenses/{license}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'license' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->machineTypes = new SmartSEO_Google_Service_Compute_MachineTypes_Resource(
        $this,
        $this->serviceName,
        'machineTypes',
        array(
          'methods' => array(
            'aggregatedList' => array(
              'path' => '{project}/aggregated/machineTypes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'get' => array(
              'path' => '{project}/zones/{zone}/machineTypes/{machineType}',
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
                'machineType' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/zones/{zone}/machineTypes',
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
    $this->networks = new SmartSEO_Google_Service_Compute_Networks_Resource(
        $this,
        $this->serviceName,
        'networks',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/global/networks/{network}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'network' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/global/networks/{network}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'network' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/global/networks',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/global/networks',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
    $this->projects = new SmartSEO_Google_Service_Compute_Projects_Resource(
        $this,
        $this->serviceName,
        'projects',
        array(
          'methods' => array(
            'get' => array(
              'path' => '{project}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setCommonInstanceMetadata' => array(
              'path' => '{project}/setCommonInstanceMetadata',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setUsageExportBucket' => array(
              'path' => '{project}/setUsageExportBucket',
              'httpMethod' => 'POST',
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
    $this->regionOperations = new SmartSEO_Google_Service_Compute_RegionOperations_Resource(
        $this,
        $this->serviceName,
        'regionOperations',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/regions/{region}/operations/{operation}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
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
              'path' => '{project}/regions/{region}/operations/{operation}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
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
              'path' => '{project}/regions/{region}/operations',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
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
    $this->regions = new SmartSEO_Google_Service_Compute_Regions_Resource(
        $this,
        $this->serviceName,
        'regions',
        array(
          'methods' => array(
            'get' => array(
              'path' => '{project}/regions/{region}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/regions',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
    $this->routes = new SmartSEO_Google_Service_Compute_Routes_Resource(
        $this,
        $this->serviceName,
        'routes',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/global/routes/{route}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'route' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/global/routes/{route}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'route' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/global/routes',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/global/routes',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
    $this->snapshots = new SmartSEO_Google_Service_Compute_Snapshots_Resource(
        $this,
        $this->serviceName,
        'snapshots',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/global/snapshots/{snapshot}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'snapshot' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/global/snapshots/{snapshot}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'snapshot' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/global/snapshots',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
    $this->targetHttpProxies = new SmartSEO_Google_Service_Compute_TargetHttpProxies_Resource(
        $this,
        $this->serviceName,
        'targetHttpProxies',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/global/targetHttpProxies/{targetHttpProxy}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetHttpProxy' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/global/targetHttpProxies/{targetHttpProxy}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetHttpProxy' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/global/targetHttpProxies',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/global/targetHttpProxies',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'setUrlMap' => array(
              'path' => '{project}/targetHttpProxies/{targetHttpProxy}/setUrlMap',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetHttpProxy' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->targetInstances = new SmartSEO_Google_Service_Compute_TargetInstances_Resource(
        $this,
        $this->serviceName,
        'targetInstances',
        array(
          'methods' => array(
            'aggregatedList' => array(
              'path' => '{project}/aggregated/targetInstances',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'delete' => array(
              'path' => '{project}/zones/{zone}/targetInstances/{targetInstance}',
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
                'targetInstance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/zones/{zone}/targetInstances/{targetInstance}',
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
                'targetInstance' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/zones/{zone}/targetInstances',
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
              'path' => '{project}/zones/{zone}/targetInstances',
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
    $this->targetPools = new SmartSEO_Google_Service_Compute_TargetPools_Resource(
        $this,
        $this->serviceName,
        'targetPools',
        array(
          'methods' => array(
            'addHealthCheck' => array(
              'path' => '{project}/regions/{region}/targetPools/{targetPool}/addHealthCheck',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetPool' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'addInstance' => array(
              'path' => '{project}/regions/{region}/targetPools/{targetPool}/addInstance',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetPool' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'aggregatedList' => array(
              'path' => '{project}/aggregated/targetPools',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
            ),'delete' => array(
              'path' => '{project}/regions/{region}/targetPools/{targetPool}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetPool' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/regions/{region}/targetPools/{targetPool}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetPool' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'getHealth' => array(
              'path' => '{project}/regions/{region}/targetPools/{targetPool}/getHealth',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetPool' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/regions/{region}/targetPools',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/regions/{region}/targetPools',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
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
            ),'removeHealthCheck' => array(
              'path' => '{project}/regions/{region}/targetPools/{targetPool}/removeHealthCheck',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetPool' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'removeInstance' => array(
              'path' => '{project}/regions/{region}/targetPools/{targetPool}/removeInstance',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetPool' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'setBackup' => array(
              'path' => '{project}/regions/{region}/targetPools/{targetPool}/setBackup',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'region' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'targetPool' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'failoverRatio' => array(
                  'location' => 'query',
                  'type' => 'number',
                ),
              ),
            ),
          )
        )
    );
    $this->urlMaps = new SmartSEO_Google_Service_Compute_UrlMaps_Resource(
        $this,
        $this->serviceName,
        'urlMaps',
        array(
          'methods' => array(
            'delete' => array(
              'path' => '{project}/global/urlMaps/{urlMap}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'urlMap' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => '{project}/global/urlMaps/{urlMap}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'urlMap' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'insert' => array(
              'path' => '{project}/global/urlMaps',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => '{project}/global/urlMaps',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
              'path' => '{project}/global/urlMaps/{urlMap}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'urlMap' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'update' => array(
              'path' => '{project}/global/urlMaps/{urlMap}',
              'httpMethod' => 'PUT',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'urlMap' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'validate' => array(
              'path' => '{project}/global/urlMaps/{urlMap}/validate',
              'httpMethod' => 'POST',
              'parameters' => array(
                'project' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'urlMap' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->zoneOperations = new SmartSEO_Google_Service_Compute_ZoneOperations_Resource(
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
    $this->zones = new SmartSEO_Google_Service_Compute_Zones_Resource(
        $this,
        $this->serviceName,
        'zones',
        array(
          'methods' => array(
            'get' => array(
              'path' => '{project}/zones/{zone}',
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
              ),
            ),'list' => array(
              'path' => '{project}/zones',
              'httpMethod' => 'GET',
              'parameters' => array(
                'project' => array(
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
 * The "addresses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $addresses = $computeService->addresses;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_Addresses_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Retrieves the list of addresses grouped by scope. (addresses.aggregatedList)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_AddressAggregatedList
   */
  public function aggregatedList($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', array($params), "SmartSEO_Google_Service_Compute_AddressAggregatedList");
  }
  /**
   * Deletes the specified address resource. (addresses.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param string $address
   * Name of the address resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $region, $address, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'address' => $address);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified address resource. (addresses.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param string $address
   * Name of the address resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Address
   */
  public function get($project, $region, $address, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'address' => $address);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Address");
  }
  /**
   * Creates an address resource in the specified project using the data included
   * in the request. (addresses.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param SmartSEO_Google_Address $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, $region, SmartSEO_Google_Service_Compute_Address $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of address resources contained within the specified
   * region. (addresses.listAddresses)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_AddressList
   */
  public function listAddresses($project, $region, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_AddressList");
  }
}

/**
 * The "backendServices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $backendServices = $computeService->backendServices;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_BackendServices_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified BackendService resource. (backendServices.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $backendService
   * Name of the BackendService resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $backendService, $optParams = array())
  {
    $params = array('project' => $project, 'backendService' => $backendService);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified BackendService resource. (backendServices.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $backendService
   * Name of the BackendService resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_BackendService
   */
  public function get($project, $backendService, $optParams = array())
  {
    $params = array('project' => $project, 'backendService' => $backendService);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_BackendService");
  }
  /**
   * Gets the most recent health check results for this BackendService.
   * (backendServices.getHealth)
   *
   * @param string $project
   *
   * @param string $backendService
   * Name of the BackendService resource to which the queried instance belongs.
   * @param SmartSEO_Google_ResourceGroupReference $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_BackendServiceGroupHealth
   */
  public function getHealth($project, $backendService, SmartSEO_Google_Service_Compute_ResourceGroupReference $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'backendService' => $backendService, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getHealth', array($params), "SmartSEO_Google_Service_Compute_BackendServiceGroupHealth");
  }
  /**
   * Creates a BackendService resource in the specified project using the data
   * included in the request. (backendServices.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param SmartSEO_Google_BackendService $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, SmartSEO_Google_Service_Compute_BackendService $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of BackendService resources available to the specified
   * project. (backendServices.listBackendServices)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_BackendServiceList
   */
  public function listBackendServices($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_BackendServiceList");
  }
  /**
   * Update the entire content of the BackendService resource. This method
   * supports patch semantics. (backendServices.patch)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $backendService
   * Name of the BackendService resource to update.
   * @param SmartSEO_Google_BackendService $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function patch($project, $backendService, SmartSEO_Google_Service_Compute_BackendService $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'backendService' => $backendService, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Update the entire content of the BackendService resource.
   * (backendServices.update)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $backendService
   * Name of the BackendService resource to update.
   * @param SmartSEO_Google_BackendService $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function update($project, $backendService, SmartSEO_Google_Service_Compute_BackendService $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'backendService' => $backendService, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
}

/**
 * The "diskTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $diskTypes = $computeService->diskTypes;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_DiskTypes_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Retrieves the list of disk type resources grouped by scope.
   * (diskTypes.aggregatedList)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_DiskTypeAggregatedList
   */
  public function aggregatedList($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', array($params), "SmartSEO_Google_Service_Compute_DiskTypeAggregatedList");
  }
  /**
   * Returns the specified disk type resource. (diskTypes.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $diskType
   * Name of the disk type resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_DiskType
   */
  public function get($project, $zone, $diskType, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'diskType' => $diskType);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_DiskType");
  }
  /**
   * Retrieves the list of disk type resources available to the specified project.
   * (diskTypes.listDiskTypes)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_DiskTypeList
   */
  public function listDiskTypes($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_DiskTypeList");
  }
}

/**
 * The "disks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $disks = $computeService->disks;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_Disks_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Retrieves the list of disks grouped by scope. (disks.aggregatedList)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_DiskAggregatedList
   */
  public function aggregatedList($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', array($params), "SmartSEO_Google_Service_Compute_DiskAggregatedList");
  }
  /**
   * (disks.createSnapshot)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $disk
   * Name of the persistent disk resource to snapshot.
   * @param SmartSEO_Google_Snapshot $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function createSnapshot($project, $zone, $disk, SmartSEO_Google_Service_Compute_Snapshot $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'disk' => $disk, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createSnapshot', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Deletes the specified persistent disk resource. (disks.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $disk
   * Name of the persistent disk resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $zone, $disk, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'disk' => $disk);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified persistent disk resource. (disks.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $disk
   * Name of the persistent disk resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Disk
   */
  public function get($project, $zone, $disk, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'disk' => $disk);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Disk");
  }
  /**
   * Creates a persistent disk resource in the specified project using the data
   * included in the request. (disks.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param SmartSEO_Google_Disk $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string sourceImage
   * Optional. Source image to restore onto a disk.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, $zone, SmartSEO_Google_Service_Compute_Disk $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of persistent disk resources contained within the
   * specified zone. (disks.listDisks)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_DiskList
   */
  public function listDisks($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_DiskList");
  }
}

/**
 * The "firewalls" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $firewalls = $computeService->firewalls;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_Firewalls_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified firewall resource. (firewalls.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $firewall
   * Name of the firewall resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $firewall, $optParams = array())
  {
    $params = array('project' => $project, 'firewall' => $firewall);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified firewall resource. (firewalls.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $firewall
   * Name of the firewall resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Firewall
   */
  public function get($project, $firewall, $optParams = array())
  {
    $params = array('project' => $project, 'firewall' => $firewall);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Firewall");
  }
  /**
   * Creates a firewall resource in the specified project using the data included
   * in the request. (firewalls.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param SmartSEO_Google_Firewall $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, SmartSEO_Google_Service_Compute_Firewall $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of firewall resources available to the specified project.
   * (firewalls.listFirewalls)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_FirewallList
   */
  public function listFirewalls($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_FirewallList");
  }
  /**
   * Updates the specified firewall resource with the data included in the
   * request. This method supports patch semantics. (firewalls.patch)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $firewall
   * Name of the firewall resource to update.
   * @param SmartSEO_Google_Firewall $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function patch($project, $firewall, SmartSEO_Google_Service_Compute_Firewall $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'firewall' => $firewall, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Updates the specified firewall resource with the data included in the
   * request. (firewalls.update)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $firewall
   * Name of the firewall resource to update.
   * @param SmartSEO_Google_Firewall $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function update($project, $firewall, SmartSEO_Google_Service_Compute_Firewall $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'firewall' => $firewall, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
}

/**
 * The "forwardingRules" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $forwardingRules = $computeService->forwardingRules;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_ForwardingRules_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Retrieves the list of forwarding rules grouped by scope.
   * (forwardingRules.aggregatedList)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_ForwardingRuleAggregatedList
   */
  public function aggregatedList($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', array($params), "SmartSEO_Google_Service_Compute_ForwardingRuleAggregatedList");
  }
  /**
   * Deletes the specified ForwardingRule resource. (forwardingRules.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param string $forwardingRule
   * Name of the ForwardingRule resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $region, $forwardingRule, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'forwardingRule' => $forwardingRule);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified ForwardingRule resource. (forwardingRules.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param string $forwardingRule
   * Name of the ForwardingRule resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_ForwardingRule
   */
  public function get($project, $region, $forwardingRule, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'forwardingRule' => $forwardingRule);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_ForwardingRule");
  }
  /**
   * Creates a ForwardingRule resource in the specified project and region using
   * the data included in the request. (forwardingRules.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param SmartSEO_Google_ForwardingRule $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, $region, SmartSEO_Google_Service_Compute_ForwardingRule $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of ForwardingRule resources available to the specified
   * project and region. (forwardingRules.listForwardingRules)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_ForwardingRuleList
   */
  public function listForwardingRules($project, $region, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_ForwardingRuleList");
  }
  /**
   * Changes target url for forwarding rule. (forwardingRules.setTarget)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param string $forwardingRule
   * Name of the ForwardingRule resource in which target is to be set.
   * @param SmartSEO_Google_TargetReference $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function setTarget($project, $region, $forwardingRule, SmartSEO_Google_Service_Compute_TargetReference $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'forwardingRule' => $forwardingRule, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setTarget', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
}

/**
 * The "globalAddresses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $globalAddresses = $computeService->globalAddresses;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_GlobalAddresses_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified address resource. (globalAddresses.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $address
   * Name of the address resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $address, $optParams = array())
  {
    $params = array('project' => $project, 'address' => $address);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified address resource. (globalAddresses.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $address
   * Name of the address resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Address
   */
  public function get($project, $address, $optParams = array())
  {
    $params = array('project' => $project, 'address' => $address);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Address");
  }
  /**
   * Creates an address resource in the specified project using the data included
   * in the request. (globalAddresses.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param SmartSEO_Google_Address $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, SmartSEO_Google_Service_Compute_Address $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of global address resources.
   * (globalAddresses.listGlobalAddresses)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_AddressList
   */
  public function listGlobalAddresses($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_AddressList");
  }
}

/**
 * The "globalForwardingRules" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $globalForwardingRules = $computeService->globalForwardingRules;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_GlobalForwardingRules_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified ForwardingRule resource. (globalForwardingRules.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $forwardingRule
   * Name of the ForwardingRule resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $forwardingRule, $optParams = array())
  {
    $params = array('project' => $project, 'forwardingRule' => $forwardingRule);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified ForwardingRule resource. (globalForwardingRules.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $forwardingRule
   * Name of the ForwardingRule resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_ForwardingRule
   */
  public function get($project, $forwardingRule, $optParams = array())
  {
    $params = array('project' => $project, 'forwardingRule' => $forwardingRule);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_ForwardingRule");
  }
  /**
   * Creates a ForwardingRule resource in the specified project and region using
   * the data included in the request. (globalForwardingRules.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param SmartSEO_Google_ForwardingRule $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, SmartSEO_Google_Service_Compute_ForwardingRule $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of ForwardingRule resources available to the specified
   * project. (globalForwardingRules.listGlobalForwardingRules)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_ForwardingRuleList
   */
  public function listGlobalForwardingRules($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_ForwardingRuleList");
  }
  /**
   * Changes target url for forwarding rule. (globalForwardingRules.setTarget)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $forwardingRule
   * Name of the ForwardingRule resource in which target is to be set.
   * @param SmartSEO_Google_TargetReference $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function setTarget($project, $forwardingRule, SmartSEO_Google_Service_Compute_TargetReference $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'forwardingRule' => $forwardingRule, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setTarget', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
}

/**
 * The "globalOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $globalOperations = $computeService->globalOperations;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_GlobalOperations_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Retrieves the list of all operations grouped by scope.
   * (globalOperations.aggregatedList)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_OperationAggregatedList
   */
  public function aggregatedList($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', array($params), "SmartSEO_Google_Service_Compute_OperationAggregatedList");
  }
  /**
   * Deletes the specified operation resource. (globalOperations.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $operation
   * Name of the operation resource to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($project, $operation, $optParams = array())
  {
    $params = array('project' => $project, 'operation' => $operation);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves the specified operation resource. (globalOperations.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $operation
   * Name of the operation resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function get($project, $operation, $optParams = array())
  {
    $params = array('project' => $project, 'operation' => $operation);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of operation resources contained within the specified
   * project. (globalOperations.listGlobalOperations)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_OperationList
   */
  public function listGlobalOperations($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_OperationList");
  }
}

/**
 * The "httpHealthChecks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $httpHealthChecks = $computeService->httpHealthChecks;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_HttpHealthChecks_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified HttpHealthCheck resource. (httpHealthChecks.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $httpHealthCheck
   * Name of the HttpHealthCheck resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $httpHealthCheck, $optParams = array())
  {
    $params = array('project' => $project, 'httpHealthCheck' => $httpHealthCheck);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified HttpHealthCheck resource. (httpHealthChecks.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $httpHealthCheck
   * Name of the HttpHealthCheck resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_HttpHealthCheck
   */
  public function get($project, $httpHealthCheck, $optParams = array())
  {
    $params = array('project' => $project, 'httpHealthCheck' => $httpHealthCheck);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_HttpHealthCheck");
  }
  /**
   * Creates a HttpHealthCheck resource in the specified project using the data
   * included in the request. (httpHealthChecks.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param SmartSEO_Google_HttpHealthCheck $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, SmartSEO_Google_Service_Compute_HttpHealthCheck $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of HttpHealthCheck resources available to the specified
   * project. (httpHealthChecks.listHttpHealthChecks)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_HttpHealthCheckList
   */
  public function listHttpHealthChecks($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_HttpHealthCheckList");
  }
  /**
   * Updates a HttpHealthCheck resource in the specified project using the data
   * included in the request. This method supports patch semantics.
   * (httpHealthChecks.patch)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $httpHealthCheck
   * Name of the HttpHealthCheck resource to update.
   * @param SmartSEO_Google_HttpHealthCheck $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function patch($project, $httpHealthCheck, SmartSEO_Google_Service_Compute_HttpHealthCheck $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'httpHealthCheck' => $httpHealthCheck, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Updates a HttpHealthCheck resource in the specified project using the data
   * included in the request. (httpHealthChecks.update)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $httpHealthCheck
   * Name of the HttpHealthCheck resource to update.
   * @param SmartSEO_Google_HttpHealthCheck $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function update($project, $httpHealthCheck, SmartSEO_Google_Service_Compute_HttpHealthCheck $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'httpHealthCheck' => $httpHealthCheck, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
}

/**
 * The "images" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $images = $computeService->images;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_Images_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified image resource. (images.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $image
   * Name of the image resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $image, $optParams = array())
  {
    $params = array('project' => $project, 'image' => $image);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Sets the deprecation status of an image. If no message body is given, clears
   * the deprecation status instead. (images.deprecate)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $image
   * Image name.
   * @param SmartSEO_Google_DeprecationStatus $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function deprecate($project, $image, SmartSEO_Google_Service_Compute_DeprecationStatus $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'image' => $image, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deprecate', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified image resource. (images.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $image
   * Name of the image resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Image
   */
  public function get($project, $image, $optParams = array())
  {
    $params = array('project' => $project, 'image' => $image);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Image");
  }
  /**
   * Creates an image resource in the specified project using the data included in
   * the request. (images.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param SmartSEO_Google_Image $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, SmartSEO_Google_Service_Compute_Image $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of image resources available to the specified project.
   * (images.listImages)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_ImageList
   */
  public function listImages($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_ImageList");
  }
}

/**
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $instances = $computeService->instances;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_Instances_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Adds an access config to an instance's network interface.
   * (instances.addAccessConfig)
   *
   * @param string $project
   * Project name.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $instance
   * Instance name.
   * @param string $networkInterface
   * Network interface name.
   * @param SmartSEO_Google_AccessConfig $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function addAccessConfig($project, $zone, $instance, $networkInterface, SmartSEO_Google_Service_Compute_AccessConfig $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance, 'networkInterface' => $networkInterface, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addAccessConfig', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * (instances.aggregatedList)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_InstanceAggregatedList
   */
  public function aggregatedList($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', array($params), "SmartSEO_Google_Service_Compute_InstanceAggregatedList");
  }
  /**
   * Attaches a disk resource to an instance. (instances.attachDisk)
   *
   * @param string $project
   * Project name.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $instance
   * Instance name.
   * @param SmartSEO_Google_AttachedDisk $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function attachDisk($project, $zone, $instance, SmartSEO_Google_Service_Compute_AttachedDisk $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('attachDisk', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Deletes the specified instance resource. (instances.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $instance
   * Name of the instance resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $zone, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Deletes an access config from an instance's network interface.
   * (instances.deleteAccessConfig)
   *
   * @param string $project
   * Project name.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $instance
   * Instance name.
   * @param string $accessConfig
   * Access config name.
   * @param string $networkInterface
   * Network interface name.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function deleteAccessConfig($project, $zone, $instance, $accessConfig, $networkInterface, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance, 'accessConfig' => $accessConfig, 'networkInterface' => $networkInterface);
    $params = array_merge($params, $optParams);
    return $this->call('deleteAccessConfig', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Detaches a disk from an instance. (instances.detachDisk)
   *
   * @param string $project
   * Project name.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $instance
   * Instance name.
   * @param string $deviceName
   * Disk device name to detach.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function detachDisk($project, $zone, $instance, $deviceName, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance, 'deviceName' => $deviceName);
    $params = array_merge($params, $optParams);
    return $this->call('detachDisk', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified instance resource. (instances.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $instance
   * Name of the instance resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Instance
   */
  public function get($project, $zone, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Instance");
  }
  /**
   * Returns the specified instance's serial port output.
   * (instances.getSerialPortOutput)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $instance
   * Name of the instance scoping this request.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_SerialPortOutput
   */
  public function getSerialPortOutput($project, $zone, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('getSerialPortOutput', array($params), "SmartSEO_Google_Service_Compute_SerialPortOutput");
  }
  /**
   * Creates an instance resource in the specified project using the data included
   * in the request. (instances.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param SmartSEO_Google_Instance $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, $zone, SmartSEO_Google_Service_Compute_Instance $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of instance resources contained within the specified zone.
   * (instances.listInstances)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_InstanceList
   */
  public function listInstances($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_InstanceList");
  }
  /**
   * Performs a hard reset on the instance. (instances.reset)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $instance
   * Name of the instance scoping this request.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function reset($project, $zone, $instance, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance);
    $params = array_merge($params, $optParams);
    return $this->call('reset', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Sets the auto-delete flag for a disk attached to an instance
   * (instances.setDiskAutoDelete)
   *
   * @param string $project
   * Project name.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $instance
   * Instance name.
   * @param bool $autoDelete
   * Whether to auto-delete the disk when the instance is deleted.
   * @param string $deviceName
   * Disk device name to modify.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function setDiskAutoDelete($project, $zone, $instance, $autoDelete, $deviceName, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance, 'autoDelete' => $autoDelete, 'deviceName' => $deviceName);
    $params = array_merge($params, $optParams);
    return $this->call('setDiskAutoDelete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Sets metadata for the specified instance to the data included in the request.
   * (instances.setMetadata)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $instance
   * Name of the instance scoping this request.
   * @param SmartSEO_Google_Metadata $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function setMetadata($project, $zone, $instance, SmartSEO_Google_Service_Compute_Metadata $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setMetadata', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Sets an instance's scheduling options. (instances.setScheduling)
   *
   * @param string $project
   * Project name.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $instance
   * Instance name.
   * @param SmartSEO_Google_Scheduling $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function setScheduling($project, $zone, $instance, SmartSEO_Google_Service_Compute_Scheduling $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setScheduling', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Sets tags for the specified instance to the data included in the request.
   * (instances.setTags)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $instance
   * Name of the instance scoping this request.
   * @param SmartSEO_Google_Tags $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function setTags($project, $zone, $instance, SmartSEO_Google_Service_Compute_Tags $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'instance' => $instance, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setTags', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
}

/**
 * The "licenses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $licenses = $computeService->licenses;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_Licenses_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Returns the specified license resource. (licenses.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $license
   * Name of the license resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_License
   */
  public function get($project, $license, $optParams = array())
  {
    $params = array('project' => $project, 'license' => $license);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_License");
  }
}

/**
 * The "machineTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $machineTypes = $computeService->machineTypes;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_MachineTypes_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Retrieves the list of machine type resources grouped by scope.
   * (machineTypes.aggregatedList)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_MachineTypeAggregatedList
   */
  public function aggregatedList($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', array($params), "SmartSEO_Google_Service_Compute_MachineTypeAggregatedList");
  }
  /**
   * Returns the specified machine type resource. (machineTypes.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $machineType
   * Name of the machine type resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_MachineType
   */
  public function get($project, $zone, $machineType, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'machineType' => $machineType);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_MachineType");
  }
  /**
   * Retrieves the list of machine type resources available to the specified
   * project. (machineTypes.listMachineTypes)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_MachineTypeList
   */
  public function listMachineTypes($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_MachineTypeList");
  }
}

/**
 * The "networks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $networks = $computeService->networks;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_Networks_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified network resource. (networks.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $network
   * Name of the network resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $network, $optParams = array())
  {
    $params = array('project' => $project, 'network' => $network);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified network resource. (networks.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $network
   * Name of the network resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Network
   */
  public function get($project, $network, $optParams = array())
  {
    $params = array('project' => $project, 'network' => $network);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Network");
  }
  /**
   * Creates a network resource in the specified project using the data included
   * in the request. (networks.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param SmartSEO_Google_Network $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, SmartSEO_Google_Service_Compute_Network $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of network resources available to the specified project.
   * (networks.listNetworks)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_NetworkList
   */
  public function listNetworks($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_NetworkList");
  }
}

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $projects = $computeService->projects;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_Projects_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Returns the specified project resource. (projects.get)
   *
   * @param string $project
   * Name of the project resource to retrieve.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Project
   */
  public function get($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Project");
  }
  /**
   * Sets metadata common to all instances within the specified project using the
   * data included in the request. (projects.setCommonInstanceMetadata)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param SmartSEO_Google_Metadata $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function setCommonInstanceMetadata($project, SmartSEO_Google_Service_Compute_Metadata $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setCommonInstanceMetadata', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Sets usage export location (projects.setUsageExportBucket)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param SmartSEO_Google_UsageExportLocation $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function setUsageExportBucket($project, SmartSEO_Google_Service_Compute_UsageExportLocation $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setUsageExportBucket', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
}

/**
 * The "regionOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $regionOperations = $computeService->regionOperations;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_RegionOperations_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified region-specific operation resource.
   * (regionOperations.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param string $operation
   * Name of the operation resource to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($project, $region, $operation, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'operation' => $operation);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves the specified region-specific operation resource.
   * (regionOperations.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the zone scoping this request.
   * @param string $operation
   * Name of the operation resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function get($project, $region, $operation, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'operation' => $operation);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of operation resources contained within the specified
   * region. (regionOperations.listRegionOperations)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_OperationList
   */
  public function listRegionOperations($project, $region, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_OperationList");
  }
}

/**
 * The "regions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $regions = $computeService->regions;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_Regions_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Returns the specified region resource. (regions.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Region
   */
  public function get($project, $region, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Region");
  }
  /**
   * Retrieves the list of region resources available to the specified project.
   * (regions.listRegions)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_RegionList
   */
  public function listRegions($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_RegionList");
  }
}

/**
 * The "routes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $routes = $computeService->routes;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_Routes_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified route resource. (routes.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $route
   * Name of the route resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $route, $optParams = array())
  {
    $params = array('project' => $project, 'route' => $route);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified route resource. (routes.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $route
   * Name of the route resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Route
   */
  public function get($project, $route, $optParams = array())
  {
    $params = array('project' => $project, 'route' => $route);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Route");
  }
  /**
   * Creates a route resource in the specified project using the data included in
   * the request. (routes.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param SmartSEO_Google_Route $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, SmartSEO_Google_Service_Compute_Route $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of route resources available to the specified project.
   * (routes.listRoutes)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_RouteList
   */
  public function listRoutes($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_RouteList");
  }
}

/**
 * The "snapshots" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $snapshots = $computeService->snapshots;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_Snapshots_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified persistent disk snapshot resource. (snapshots.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $snapshot
   * Name of the persistent disk snapshot resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $snapshot, $optParams = array())
  {
    $params = array('project' => $project, 'snapshot' => $snapshot);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified persistent disk snapshot resource. (snapshots.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $snapshot
   * Name of the persistent disk snapshot resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Snapshot
   */
  public function get($project, $snapshot, $optParams = array())
  {
    $params = array('project' => $project, 'snapshot' => $snapshot);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Snapshot");
  }
  /**
   * Retrieves the list of persistent disk snapshot resources contained within the
   * specified project. (snapshots.listSnapshots)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_SnapshotList
   */
  public function listSnapshots($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_SnapshotList");
  }
}

/**
 * The "targetHttpProxies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $targetHttpProxies = $computeService->targetHttpProxies;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_TargetHttpProxies_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified TargetHttpProxy resource. (targetHttpProxies.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $targetHttpProxy
   * Name of the TargetHttpProxy resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $targetHttpProxy, $optParams = array())
  {
    $params = array('project' => $project, 'targetHttpProxy' => $targetHttpProxy);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified TargetHttpProxy resource. (targetHttpProxies.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $targetHttpProxy
   * Name of the TargetHttpProxy resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_TargetHttpProxy
   */
  public function get($project, $targetHttpProxy, $optParams = array())
  {
    $params = array('project' => $project, 'targetHttpProxy' => $targetHttpProxy);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_TargetHttpProxy");
  }
  /**
   * Creates a TargetHttpProxy resource in the specified project using the data
   * included in the request. (targetHttpProxies.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param SmartSEO_Google_TargetHttpProxy $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, SmartSEO_Google_Service_Compute_TargetHttpProxy $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of TargetHttpProxy resources available to the specified
   * project. (targetHttpProxies.listTargetHttpProxies)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_TargetHttpProxyList
   */
  public function listTargetHttpProxies($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_TargetHttpProxyList");
  }
  /**
   * Changes the URL map for TargetHttpProxy. (targetHttpProxies.setUrlMap)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $targetHttpProxy
   * Name of the TargetHttpProxy resource whose URL map is to be set.
   * @param SmartSEO_Google_UrlMapReference $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function setUrlMap($project, $targetHttpProxy, SmartSEO_Google_Service_Compute_UrlMapReference $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'targetHttpProxy' => $targetHttpProxy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setUrlMap', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
}

/**
 * The "targetInstances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $targetInstances = $computeService->targetInstances;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_TargetInstances_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Retrieves the list of target instances grouped by scope.
   * (targetInstances.aggregatedList)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_TargetInstanceAggregatedList
   */
  public function aggregatedList($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', array($params), "SmartSEO_Google_Service_Compute_TargetInstanceAggregatedList");
  }
  /**
   * Deletes the specified TargetInstance resource. (targetInstances.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $targetInstance
   * Name of the TargetInstance resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $zone, $targetInstance, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'targetInstance' => $targetInstance);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified TargetInstance resource. (targetInstances.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $targetInstance
   * Name of the TargetInstance resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_TargetInstance
   */
  public function get($project, $zone, $targetInstance, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'targetInstance' => $targetInstance);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_TargetInstance");
  }
  /**
   * Creates a TargetInstance resource in the specified project and zone using the
   * data included in the request. (targetInstances.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param SmartSEO_Google_TargetInstance $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, $zone, SmartSEO_Google_Service_Compute_TargetInstance $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of TargetInstance resources available to the specified
   * project and zone. (targetInstances.listTargetInstances)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_TargetInstanceList
   */
  public function listTargetInstances($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_TargetInstanceList");
  }
}

/**
 * The "targetPools" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $targetPools = $computeService->targetPools;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_TargetPools_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Adds health check URL to targetPool. (targetPools.addHealthCheck)
   *
   * @param string $project
   *
   * @param string $region
   * Name of the region scoping this request.
   * @param string $targetPool
   * Name of the TargetPool resource to which health_check_url is to be added.
   * @param SmartSEO_Google_TargetPoolsAddHealthCheckRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function addHealthCheck($project, $region, $targetPool, SmartSEO_Google_Service_Compute_TargetPoolsAddHealthCheckRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addHealthCheck', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Adds instance url to targetPool. (targetPools.addInstance)
   *
   * @param string $project
   *
   * @param string $region
   * Name of the region scoping this request.
   * @param string $targetPool
   * Name of the TargetPool resource to which instance_url is to be added.
   * @param SmartSEO_Google_TargetPoolsAddInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function addInstance($project, $region, $targetPool, SmartSEO_Google_Service_Compute_TargetPoolsAddInstanceRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addInstance', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of target pools grouped by scope.
   * (targetPools.aggregatedList)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_TargetPoolAggregatedList
   */
  public function aggregatedList($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', array($params), "SmartSEO_Google_Service_Compute_TargetPoolAggregatedList");
  }
  /**
   * Deletes the specified TargetPool resource. (targetPools.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param string $targetPool
   * Name of the TargetPool resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $region, $targetPool, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'targetPool' => $targetPool);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified TargetPool resource. (targetPools.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param string $targetPool
   * Name of the TargetPool resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_TargetPool
   */
  public function get($project, $region, $targetPool, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'targetPool' => $targetPool);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_TargetPool");
  }
  /**
   * Gets the most recent health check results for each IP for the given instance
   * that is referenced by given TargetPool. (targetPools.getHealth)
   *
   * @param string $project
   *
   * @param string $region
   * Name of the region scoping this request.
   * @param string $targetPool
   * Name of the TargetPool resource to which the queried instance belongs.
   * @param SmartSEO_Google_InstanceReference $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_TargetPoolInstanceHealth
   */
  public function getHealth($project, $region, $targetPool, SmartSEO_Google_Service_Compute_InstanceReference $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getHealth', array($params), "SmartSEO_Google_Service_Compute_TargetPoolInstanceHealth");
  }
  /**
   * Creates a TargetPool resource in the specified project and region using the
   * data included in the request. (targetPools.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param SmartSEO_Google_TargetPool $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, $region, SmartSEO_Google_Service_Compute_TargetPool $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of TargetPool resources available to the specified project
   * and region. (targetPools.listTargetPools)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_TargetPoolList
   */
  public function listTargetPools($project, $region, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_TargetPoolList");
  }
  /**
   * Removes health check URL from targetPool. (targetPools.removeHealthCheck)
   *
   * @param string $project
   *
   * @param string $region
   * Name of the region scoping this request.
   * @param string $targetPool
   * Name of the TargetPool resource to which health_check_url is to be removed.
   * @param SmartSEO_Google_TargetPoolsRemoveHealthCheckRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function removeHealthCheck($project, $region, $targetPool, SmartSEO_Google_Service_Compute_TargetPoolsRemoveHealthCheckRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('removeHealthCheck', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Removes instance URL from targetPool. (targetPools.removeInstance)
   *
   * @param string $project
   *
   * @param string $region
   * Name of the region scoping this request.
   * @param string $targetPool
   * Name of the TargetPool resource to which instance_url is to be removed.
   * @param SmartSEO_Google_TargetPoolsRemoveInstanceRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function removeInstance($project, $region, $targetPool, SmartSEO_Google_Service_Compute_TargetPoolsRemoveInstanceRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('removeInstance', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Changes backup pool configurations. (targetPools.setBackup)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $region
   * Name of the region scoping this request.
   * @param string $targetPool
   * Name of the TargetPool resource for which the backup is to be set.
   * @param SmartSEO_Google_TargetReference $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param float failoverRatio
   * New failoverRatio value for the containing target pool.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function setBackup($project, $region, $targetPool, SmartSEO_Google_Service_Compute_TargetReference $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setBackup', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
}

/**
 * The "urlMaps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $urlMaps = $computeService->urlMaps;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_UrlMaps_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified UrlMap resource. (urlMaps.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $urlMap
   * Name of the UrlMap resource to delete.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function delete($project, $urlMap, $optParams = array())
  {
    $params = array('project' => $project, 'urlMap' => $urlMap);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified UrlMap resource. (urlMaps.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $urlMap
   * Name of the UrlMap resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_UrlMap
   */
  public function get($project, $urlMap, $optParams = array())
  {
    $params = array('project' => $project, 'urlMap' => $urlMap);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_UrlMap");
  }
  /**
   * Creates a UrlMap resource in the specified project using the data included in
   * the request. (urlMaps.insert)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param SmartSEO_Google_UrlMap $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function insert($project, SmartSEO_Google_Service_Compute_UrlMap $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of UrlMap resources available to the specified project.
   * (urlMaps.listUrlMaps)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_UrlMapList
   */
  public function listUrlMaps($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_UrlMapList");
  }
  /**
   * Update the entire content of the UrlMap resource. This method supports patch
   * semantics. (urlMaps.patch)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $urlMap
   * Name of the UrlMap resource to update.
   * @param SmartSEO_Google_UrlMap $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function patch($project, $urlMap, SmartSEO_Google_Service_Compute_UrlMap $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'urlMap' => $urlMap, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Update the entire content of the UrlMap resource. (urlMaps.update)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $urlMap
   * Name of the UrlMap resource to update.
   * @param SmartSEO_Google_UrlMap $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function update($project, $urlMap, SmartSEO_Google_Service_Compute_UrlMap $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'urlMap' => $urlMap, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Run static validation for the UrlMap. In particular, the tests of the
   * provided UrlMap will be run. Calling this method does NOT create the UrlMap.
   * (urlMaps.validate)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $urlMap
   * Name of the UrlMap resource to be validated as.
   * @param SmartSEO_Google_UrlMapsValidateRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_UrlMapsValidateResponse
   */
  public function validate($project, $urlMap, SmartSEO_Google_Service_Compute_UrlMapsValidateRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'urlMap' => $urlMap, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('validate', array($params), "SmartSEO_Google_Service_Compute_UrlMapsValidateResponse");
  }
}

/**
 * The "zoneOperations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $zoneOperations = $computeService->zoneOperations;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_ZoneOperations_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Deletes the specified zone-specific operation resource.
   * (zoneOperations.delete)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $operation
   * Name of the operation resource to delete.
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
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param string $operation
   * Name of the operation resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Operation
   */
  public function get($project, $zone, $operation, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'operation' => $operation);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of operation resources contained within the specified
   * zone. (zoneOperations.listZoneOperations)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_OperationList
   */
  public function listZoneOperations($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_OperationList");
  }
}

/**
 * The "zones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new SmartSEO_Google_Service_Compute(...);
 *   $zones = $computeService->zones;
 *  </code>
 */
class SmartSEO_Google_Service_Compute_Zones_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Returns the specified zone resource. (zones.get)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param string $zone
   * Name of the zone resource to return.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_Compute_Zone
   */
  public function get($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_Compute_Zone");
  }
  /**
   * Retrieves the list of zone resources available to the specified project.
   * (zones.listZones)
   *
   * @param string $project
   * Name of the project scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * Optional. Filter expression for filtering listed resources.
   * @opt_param string pageToken
   * Optional. Tag returned by a previous list request truncated by maxResults. Used to continue a
    * previous list request.
   * @opt_param string maxResults
   * Optional. Maximum count of results to be returned. Maximum value is 500 and default value is
    * 500.
   * @return SmartSEO_Google_Service_Compute_ZoneList
   */
  public function listZones($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_Compute_ZoneList");
  }
}




class SmartSEO_Google_Service_Compute_AccessConfig extends SmartSEO_Google_Model
{
  public $kind;
  public $name;
  public $natIP;
  public $type;

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

  public function setNatIP($natIP)
  {
    $this->natIP = $natIP;
  }

  public function getNatIP()
  {
    return $this->natIP;
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

class SmartSEO_Google_Service_Compute_Address extends SmartSEO_Google_Collection
{
  public $address;
  public $creationTimestamp;
  public $description;
  public $id;
  public $kind;
  public $name;
  public $region;
  public $selfLink;
  public $status;
  public $users;

  public function setAddress($address)
  {
    $this->address = $address;
  }

  public function getAddress()
  {
    return $this->address;
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

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setUsers($users)
  {
    $this->users = $users;
  }

  public function getUsers()
  {
    return $this->users;
  }
}

class SmartSEO_Google_Service_Compute_AddressAggregatedList extends SmartSEO_Google_Model
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_AddressesScopedList';
  protected $itemsDataType = 'map';
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

class SmartSEO_Google_Service_Compute_AddressAggregatedListItems extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_Compute_AddressList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_Address';
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

class SmartSEO_Google_Service_Compute_AddressesScopedList extends SmartSEO_Google_Collection
{
  protected $addressesType = 'SmartSEO_Google_Service_Compute_Address';
  protected $addressesDataType = 'array';
  protected $warningType = 'SmartSEO_Google_Service_Compute_AddressesScopedListWarning';
  protected $warningDataType = '';

  public function setAddresses($addresses)
  {
    $this->addresses = $addresses;
  }

  public function getAddresses()
  {
    return $this->addresses;
  }

  public function setWarning(SmartSEO_Google_Service_Compute_AddressesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }

  public function getWarning()
  {
    return $this->warning;
  }
}

class SmartSEO_Google_Service_Compute_AddressesScopedListWarning extends SmartSEO_Google_Collection
{
  public $code;
  protected $dataType = 'SmartSEO_Google_Service_Compute_AddressesScopedListWarningData';
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

class SmartSEO_Google_Service_Compute_AddressesScopedListWarningData extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_AttachedDisk extends SmartSEO_Google_Collection
{
  public $autoDelete;
  public $boot;
  public $deviceName;
  public $index;
  protected $initializeParamsType = 'SmartSEO_Google_Service_Compute_AttachedDiskInitializeParams';
  protected $initializeParamsDataType = '';
  public $kind;
  public $licenses;
  public $mode;
  public $source;
  public $type;

  public function setAutoDelete($autoDelete)
  {
    $this->autoDelete = $autoDelete;
  }

  public function getAutoDelete()
  {
    return $this->autoDelete;
  }

  public function setBoot($boot)
  {
    $this->boot = $boot;
  }

  public function getBoot()
  {
    return $this->boot;
  }

  public function setDeviceName($deviceName)
  {
    $this->deviceName = $deviceName;
  }

  public function getDeviceName()
  {
    return $this->deviceName;
  }

  public function setIndex($index)
  {
    $this->index = $index;
  }

  public function getIndex()
  {
    return $this->index;
  }

  public function setInitializeParams(SmartSEO_Google_Service_Compute_AttachedDiskInitializeParams $initializeParams)
  {
    $this->initializeParams = $initializeParams;
  }

  public function getInitializeParams()
  {
    return $this->initializeParams;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLicenses($licenses)
  {
    $this->licenses = $licenses;
  }

  public function getLicenses()
  {
    return $this->licenses;
  }

  public function setMode($mode)
  {
    $this->mode = $mode;
  }

  public function getMode()
  {
    return $this->mode;
  }

  public function setSource($source)
  {
    $this->source = $source;
  }

  public function getSource()
  {
    return $this->source;
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

class SmartSEO_Google_Service_Compute_AttachedDiskInitializeParams extends SmartSEO_Google_Model
{
  public $diskName;
  public $diskSizeGb;
  public $diskType;
  public $sourceImage;

  public function setDiskName($diskName)
  {
    $this->diskName = $diskName;
  }

  public function getDiskName()
  {
    return $this->diskName;
  }

  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }

  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
  }

  public function setDiskType($diskType)
  {
    $this->diskType = $diskType;
  }

  public function getDiskType()
  {
    return $this->diskType;
  }

  public function setSourceImage($sourceImage)
  {
    $this->sourceImage = $sourceImage;
  }

  public function getSourceImage()
  {
    return $this->sourceImage;
  }
}

class SmartSEO_Google_Service_Compute_Backend extends SmartSEO_Google_Model
{
  public $balancingMode;
  public $capacityScaler;
  public $description;
  public $group;
  public $maxRate;
  public $maxRatePerInstance;
  public $maxUtilization;

  public function setBalancingMode($balancingMode)
  {
    $this->balancingMode = $balancingMode;
  }

  public function getBalancingMode()
  {
    return $this->balancingMode;
  }

  public function setCapacityScaler($capacityScaler)
  {
    $this->capacityScaler = $capacityScaler;
  }

  public function getCapacityScaler()
  {
    return $this->capacityScaler;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setGroup($group)
  {
    $this->group = $group;
  }

  public function getGroup()
  {
    return $this->group;
  }

  public function setMaxRate($maxRate)
  {
    $this->maxRate = $maxRate;
  }

  public function getMaxRate()
  {
    return $this->maxRate;
  }

  public function setMaxRatePerInstance($maxRatePerInstance)
  {
    $this->maxRatePerInstance = $maxRatePerInstance;
  }

  public function getMaxRatePerInstance()
  {
    return $this->maxRatePerInstance;
  }

  public function setMaxUtilization($maxUtilization)
  {
    $this->maxUtilization = $maxUtilization;
  }

  public function getMaxUtilization()
  {
    return $this->maxUtilization;
  }
}

class SmartSEO_Google_Service_Compute_BackendService extends SmartSEO_Google_Collection
{
  protected $backendsType = 'SmartSEO_Google_Service_Compute_Backend';
  protected $backendsDataType = 'array';
  public $creationTimestamp;
  public $description;
  public $fingerprint;
  public $healthChecks;
  public $id;
  public $kind;
  public $name;
  public $port;
  public $protocol;
  public $selfLink;
  public $timeoutSec;

  public function setBackends($backends)
  {
    $this->backends = $backends;
  }

  public function getBackends()
  {
    return $this->backends;
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

  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }

  public function getFingerprint()
  {
    return $this->fingerprint;
  }

  public function setHealthChecks($healthChecks)
  {
    $this->healthChecks = $healthChecks;
  }

  public function getHealthChecks()
  {
    return $this->healthChecks;
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

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setPort($port)
  {
    $this->port = $port;
  }

  public function getPort()
  {
    return $this->port;
  }

  public function setProtocol($protocol)
  {
    $this->protocol = $protocol;
  }

  public function getProtocol()
  {
    return $this->protocol;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setTimeoutSec($timeoutSec)
  {
    $this->timeoutSec = $timeoutSec;
  }

  public function getTimeoutSec()
  {
    return $this->timeoutSec;
  }
}

class SmartSEO_Google_Service_Compute_BackendServiceGroupHealth extends SmartSEO_Google_Collection
{
  protected $healthStatusType = 'SmartSEO_Google_Service_Compute_HealthStatus';
  protected $healthStatusDataType = 'array';
  public $kind;

  public function setHealthStatus($healthStatus)
  {
    $this->healthStatus = $healthStatus;
  }

  public function getHealthStatus()
  {
    return $this->healthStatus;
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

class SmartSEO_Google_Service_Compute_BackendServiceList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_BackendService';
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

class SmartSEO_Google_Service_Compute_DeprecationStatus extends SmartSEO_Google_Model
{
  public $deleted;
  public $deprecated;
  public $obsolete;
  public $replacement;
  public $state;

  public function setDeleted($deleted)
  {
    $this->deleted = $deleted;
  }

  public function getDeleted()
  {
    return $this->deleted;
  }

  public function setDeprecated($deprecated)
  {
    $this->deprecated = $deprecated;
  }

  public function getDeprecated()
  {
    return $this->deprecated;
  }

  public function setObsolete($obsolete)
  {
    $this->obsolete = $obsolete;
  }

  public function getObsolete()
  {
    return $this->obsolete;
  }

  public function setReplacement($replacement)
  {
    $this->replacement = $replacement;
  }

  public function getReplacement()
  {
    return $this->replacement;
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

class SmartSEO_Google_Service_Compute_Disk extends SmartSEO_Google_Collection
{
  public $creationTimestamp;
  public $description;
  public $id;
  public $kind;
  public $licenses;
  public $name;
  public $options;
  public $selfLink;
  public $sizeGb;
  public $sourceImage;
  public $sourceImageId;
  public $sourceSnapshot;
  public $sourceSnapshotId;
  public $status;
  public $type;
  public $zone;

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

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setLicenses($licenses)
  {
    $this->licenses = $licenses;
  }

  public function getLicenses()
  {
    return $this->licenses;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setOptions($options)
  {
    $this->options = $options;
  }

  public function getOptions()
  {
    return $this->options;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setSizeGb($sizeGb)
  {
    $this->sizeGb = $sizeGb;
  }

  public function getSizeGb()
  {
    return $this->sizeGb;
  }

  public function setSourceImage($sourceImage)
  {
    $this->sourceImage = $sourceImage;
  }

  public function getSourceImage()
  {
    return $this->sourceImage;
  }

  public function setSourceImageId($sourceImageId)
  {
    $this->sourceImageId = $sourceImageId;
  }

  public function getSourceImageId()
  {
    return $this->sourceImageId;
  }

  public function setSourceSnapshot($sourceSnapshot)
  {
    $this->sourceSnapshot = $sourceSnapshot;
  }

  public function getSourceSnapshot()
  {
    return $this->sourceSnapshot;
  }

  public function setSourceSnapshotId($sourceSnapshotId)
  {
    $this->sourceSnapshotId = $sourceSnapshotId;
  }

  public function getSourceSnapshotId()
  {
    return $this->sourceSnapshotId;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getType()
  {
    return $this->type;
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

class SmartSEO_Google_Service_Compute_DiskAggregatedList extends SmartSEO_Google_Model
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_DisksScopedList';
  protected $itemsDataType = 'map';
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

class SmartSEO_Google_Service_Compute_DiskAggregatedListItems extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_Compute_DiskList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_Disk';
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

class SmartSEO_Google_Service_Compute_DiskType extends SmartSEO_Google_Model
{
  public $creationTimestamp;
  protected $deprecatedType = 'SmartSEO_Google_Service_Compute_DeprecationStatus';
  protected $deprecatedDataType = '';
  public $description;
  public $id;
  public $kind;
  public $name;
  public $selfLink;
  public $validDiskSize;
  public $zone;

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }

  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }

  public function setDeprecated(SmartSEO_Google_Service_Compute_DeprecationStatus $deprecated)
  {
    $this->deprecated = $deprecated;
  }

  public function getDeprecated()
  {
    return $this->deprecated;
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

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setValidDiskSize($validDiskSize)
  {
    $this->validDiskSize = $validDiskSize;
  }

  public function getValidDiskSize()
  {
    return $this->validDiskSize;
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

class SmartSEO_Google_Service_Compute_DiskTypeAggregatedList extends SmartSEO_Google_Model
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_DiskTypesScopedList';
  protected $itemsDataType = 'map';
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

class SmartSEO_Google_Service_Compute_DiskTypeAggregatedListItems extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_Compute_DiskTypeList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_DiskType';
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

class SmartSEO_Google_Service_Compute_DiskTypesScopedList extends SmartSEO_Google_Collection
{
  protected $diskTypesType = 'SmartSEO_Google_Service_Compute_DiskType';
  protected $diskTypesDataType = 'array';
  protected $warningType = 'SmartSEO_Google_Service_Compute_DiskTypesScopedListWarning';
  protected $warningDataType = '';

  public function setDiskTypes($diskTypes)
  {
    $this->diskTypes = $diskTypes;
  }

  public function getDiskTypes()
  {
    return $this->diskTypes;
  }

  public function setWarning(SmartSEO_Google_Service_Compute_DiskTypesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }

  public function getWarning()
  {
    return $this->warning;
  }
}

class SmartSEO_Google_Service_Compute_DiskTypesScopedListWarning extends SmartSEO_Google_Collection
{
  public $code;
  protected $dataType = 'SmartSEO_Google_Service_Compute_DiskTypesScopedListWarningData';
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

class SmartSEO_Google_Service_Compute_DiskTypesScopedListWarningData extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_DisksScopedList extends SmartSEO_Google_Collection
{
  protected $disksType = 'SmartSEO_Google_Service_Compute_Disk';
  protected $disksDataType = 'array';
  protected $warningType = 'SmartSEO_Google_Service_Compute_DisksScopedListWarning';
  protected $warningDataType = '';

  public function setDisks($disks)
  {
    $this->disks = $disks;
  }

  public function getDisks()
  {
    return $this->disks;
  }

  public function setWarning(SmartSEO_Google_Service_Compute_DisksScopedListWarning $warning)
  {
    $this->warning = $warning;
  }

  public function getWarning()
  {
    return $this->warning;
  }
}

class SmartSEO_Google_Service_Compute_DisksScopedListWarning extends SmartSEO_Google_Collection
{
  public $code;
  protected $dataType = 'SmartSEO_Google_Service_Compute_DisksScopedListWarningData';
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

class SmartSEO_Google_Service_Compute_DisksScopedListWarningData extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_Firewall extends SmartSEO_Google_Collection
{
  protected $allowedType = 'SmartSEO_Google_Service_Compute_FirewallAllowed';
  protected $allowedDataType = 'array';
  public $creationTimestamp;
  public $description;
  public $id;
  public $kind;
  public $name;
  public $network;
  public $selfLink;
  public $sourceRanges;
  public $sourceTags;
  public $targetTags;

  public function setAllowed($allowed)
  {
    $this->allowed = $allowed;
  }

  public function getAllowed()
  {
    return $this->allowed;
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

  public function setNetwork($network)
  {
    $this->network = $network;
  }

  public function getNetwork()
  {
    return $this->network;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setSourceRanges($sourceRanges)
  {
    $this->sourceRanges = $sourceRanges;
  }

  public function getSourceRanges()
  {
    return $this->sourceRanges;
  }

  public function setSourceTags($sourceTags)
  {
    $this->sourceTags = $sourceTags;
  }

  public function getSourceTags()
  {
    return $this->sourceTags;
  }

  public function setTargetTags($targetTags)
  {
    $this->targetTags = $targetTags;
  }

  public function getTargetTags()
  {
    return $this->targetTags;
  }
}

class SmartSEO_Google_Service_Compute_FirewallAllowed extends SmartSEO_Google_Collection
{
  public $iPProtocol;
  public $ports;

  public function setIPProtocol($iPProtocol)
  {
    $this->iPProtocol = $iPProtocol;
  }

  public function getIPProtocol()
  {
    return $this->iPProtocol;
  }

  public function setPorts($ports)
  {
    $this->ports = $ports;
  }

  public function getPorts()
  {
    return $this->ports;
  }
}

class SmartSEO_Google_Service_Compute_FirewallList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_Firewall';
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

class SmartSEO_Google_Service_Compute_ForwardingRule extends SmartSEO_Google_Model
{
  public $iPAddress;
  public $iPProtocol;
  public $creationTimestamp;
  public $description;
  public $id;
  public $kind;
  public $name;
  public $portRange;
  public $region;
  public $selfLink;
  public $target;

  public function setIPAddress($iPAddress)
  {
    $this->iPAddress = $iPAddress;
  }

  public function getIPAddress()
  {
    return $this->iPAddress;
  }

  public function setIPProtocol($iPProtocol)
  {
    $this->iPProtocol = $iPProtocol;
  }

  public function getIPProtocol()
  {
    return $this->iPProtocol;
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

  public function setPortRange($portRange)
  {
    $this->portRange = $portRange;
  }

  public function getPortRange()
  {
    return $this->portRange;
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

  public function setTarget($target)
  {
    $this->target = $target;
  }

  public function getTarget()
  {
    return $this->target;
  }
}

class SmartSEO_Google_Service_Compute_ForwardingRuleAggregatedList extends SmartSEO_Google_Model
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_ForwardingRulesScopedList';
  protected $itemsDataType = 'map';
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

class SmartSEO_Google_Service_Compute_ForwardingRuleAggregatedListItems extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_Compute_ForwardingRuleList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_ForwardingRule';
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

class SmartSEO_Google_Service_Compute_ForwardingRulesScopedList extends SmartSEO_Google_Collection
{
  protected $forwardingRulesType = 'SmartSEO_Google_Service_Compute_ForwardingRule';
  protected $forwardingRulesDataType = 'array';
  protected $warningType = 'SmartSEO_Google_Service_Compute_ForwardingRulesScopedListWarning';
  protected $warningDataType = '';

  public function setForwardingRules($forwardingRules)
  {
    $this->forwardingRules = $forwardingRules;
  }

  public function getForwardingRules()
  {
    return $this->forwardingRules;
  }

  public function setWarning(SmartSEO_Google_Service_Compute_ForwardingRulesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }

  public function getWarning()
  {
    return $this->warning;
  }
}

class SmartSEO_Google_Service_Compute_ForwardingRulesScopedListWarning extends SmartSEO_Google_Collection
{
  public $code;
  protected $dataType = 'SmartSEO_Google_Service_Compute_ForwardingRulesScopedListWarningData';
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

class SmartSEO_Google_Service_Compute_ForwardingRulesScopedListWarningData extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_HealthCheckReference extends SmartSEO_Google_Model
{
  public $healthCheck;

  public function setHealthCheck($healthCheck)
  {
    $this->healthCheck = $healthCheck;
  }

  public function getHealthCheck()
  {
    return $this->healthCheck;
  }
}

class SmartSEO_Google_Service_Compute_HealthStatus extends SmartSEO_Google_Model
{
  public $healthState;
  public $instance;
  public $ipAddress;

  public function setHealthState($healthState)
  {
    $this->healthState = $healthState;
  }

  public function getHealthState()
  {
    return $this->healthState;
  }

  public function setInstance($instance)
  {
    $this->instance = $instance;
  }

  public function getInstance()
  {
    return $this->instance;
  }

  public function setIpAddress($ipAddress)
  {
    $this->ipAddress = $ipAddress;
  }

  public function getIpAddress()
  {
    return $this->ipAddress;
  }
}

class SmartSEO_Google_Service_Compute_HostRule extends SmartSEO_Google_Collection
{
  public $description;
  public $hosts;
  public $pathMatcher;

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setHosts($hosts)
  {
    $this->hosts = $hosts;
  }

  public function getHosts()
  {
    return $this->hosts;
  }

  public function setPathMatcher($pathMatcher)
  {
    $this->pathMatcher = $pathMatcher;
  }

  public function getPathMatcher()
  {
    return $this->pathMatcher;
  }
}

class SmartSEO_Google_Service_Compute_HttpHealthCheck extends SmartSEO_Google_Model
{
  public $checkIntervalSec;
  public $creationTimestamp;
  public $description;
  public $healthyThreshold;
  public $host;
  public $id;
  public $kind;
  public $name;
  public $port;
  public $requestPath;
  public $selfLink;
  public $timeoutSec;
  public $unhealthyThreshold;

  public function setCheckIntervalSec($checkIntervalSec)
  {
    $this->checkIntervalSec = $checkIntervalSec;
  }

  public function getCheckIntervalSec()
  {
    return $this->checkIntervalSec;
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

  public function setHealthyThreshold($healthyThreshold)
  {
    $this->healthyThreshold = $healthyThreshold;
  }

  public function getHealthyThreshold()
  {
    return $this->healthyThreshold;
  }

  public function setHost($host)
  {
    $this->host = $host;
  }

  public function getHost()
  {
    return $this->host;
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

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setPort($port)
  {
    $this->port = $port;
  }

  public function getPort()
  {
    return $this->port;
  }

  public function setRequestPath($requestPath)
  {
    $this->requestPath = $requestPath;
  }

  public function getRequestPath()
  {
    return $this->requestPath;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setTimeoutSec($timeoutSec)
  {
    $this->timeoutSec = $timeoutSec;
  }

  public function getTimeoutSec()
  {
    return $this->timeoutSec;
  }

  public function setUnhealthyThreshold($unhealthyThreshold)
  {
    $this->unhealthyThreshold = $unhealthyThreshold;
  }

  public function getUnhealthyThreshold()
  {
    return $this->unhealthyThreshold;
  }
}

class SmartSEO_Google_Service_Compute_HttpHealthCheckList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_HttpHealthCheck';
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

class SmartSEO_Google_Service_Compute_Image extends SmartSEO_Google_Collection
{
  public $archiveSizeBytes;
  public $creationTimestamp;
  protected $deprecatedType = 'SmartSEO_Google_Service_Compute_DeprecationStatus';
  protected $deprecatedDataType = '';
  public $description;
  public $diskSizeGb;
  public $id;
  public $kind;
  public $licenses;
  public $name;
  protected $rawDiskType = 'SmartSEO_Google_Service_Compute_ImageRawDisk';
  protected $rawDiskDataType = '';
  public $selfLink;
  public $sourceDisk;
  public $sourceDiskId;
  public $sourceType;
  public $status;

  public function setArchiveSizeBytes($archiveSizeBytes)
  {
    $this->archiveSizeBytes = $archiveSizeBytes;
  }

  public function getArchiveSizeBytes()
  {
    return $this->archiveSizeBytes;
  }

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }

  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }

  public function setDeprecated(SmartSEO_Google_Service_Compute_DeprecationStatus $deprecated)
  {
    $this->deprecated = $deprecated;
  }

  public function getDeprecated()
  {
    return $this->deprecated;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }

  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
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

  public function setLicenses($licenses)
  {
    $this->licenses = $licenses;
  }

  public function getLicenses()
  {
    return $this->licenses;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setRawDisk(SmartSEO_Google_Service_Compute_ImageRawDisk $rawDisk)
  {
    $this->rawDisk = $rawDisk;
  }

  public function getRawDisk()
  {
    return $this->rawDisk;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setSourceDisk($sourceDisk)
  {
    $this->sourceDisk = $sourceDisk;
  }

  public function getSourceDisk()
  {
    return $this->sourceDisk;
  }

  public function setSourceDiskId($sourceDiskId)
  {
    $this->sourceDiskId = $sourceDiskId;
  }

  public function getSourceDiskId()
  {
    return $this->sourceDiskId;
  }

  public function setSourceType($sourceType)
  {
    $this->sourceType = $sourceType;
  }

  public function getSourceType()
  {
    return $this->sourceType;
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

class SmartSEO_Google_Service_Compute_ImageList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_Image';
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

class SmartSEO_Google_Service_Compute_ImageRawDisk extends SmartSEO_Google_Model
{
  public $containerType;
  public $sha1Checksum;
  public $source;

  public function setContainerType($containerType)
  {
    $this->containerType = $containerType;
  }

  public function getContainerType()
  {
    return $this->containerType;
  }

  public function setSha1Checksum($sha1Checksum)
  {
    $this->sha1Checksum = $sha1Checksum;
  }

  public function getSha1Checksum()
  {
    return $this->sha1Checksum;
  }

  public function setSource($source)
  {
    $this->source = $source;
  }

  public function getSource()
  {
    return $this->source;
  }
}

class SmartSEO_Google_Service_Compute_Instance extends SmartSEO_Google_Collection
{
  public $canIpForward;
  public $creationTimestamp;
  public $description;
  protected $disksType = 'SmartSEO_Google_Service_Compute_AttachedDisk';
  protected $disksDataType = 'array';
  public $id;
  public $kind;
  public $machineType;
  protected $metadataType = 'SmartSEO_Google_Service_Compute_Metadata';
  protected $metadataDataType = '';
  public $name;
  protected $networkInterfacesType = 'SmartSEO_Google_Service_Compute_NetworkInterface';
  protected $networkInterfacesDataType = 'array';
  protected $schedulingType = 'SmartSEO_Google_Service_Compute_Scheduling';
  protected $schedulingDataType = '';
  public $selfLink;
  protected $serviceAccountsType = 'SmartSEO_Google_Service_Compute_ServiceAccount';
  protected $serviceAccountsDataType = 'array';
  public $status;
  public $statusMessage;
  protected $tagsType = 'SmartSEO_Google_Service_Compute_Tags';
  protected $tagsDataType = '';
  public $zone;

  public function setCanIpForward($canIpForward)
  {
    $this->canIpForward = $canIpForward;
  }

  public function getCanIpForward()
  {
    return $this->canIpForward;
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

  public function setDisks($disks)
  {
    $this->disks = $disks;
  }

  public function getDisks()
  {
    return $this->disks;
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

  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }

  public function getMachineType()
  {
    return $this->machineType;
  }

  public function setMetadata(SmartSEO_Google_Service_Compute_Metadata $metadata)
  {
    $this->metadata = $metadata;
  }

  public function getMetadata()
  {
    return $this->metadata;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setNetworkInterfaces($networkInterfaces)
  {
    $this->networkInterfaces = $networkInterfaces;
  }

  public function getNetworkInterfaces()
  {
    return $this->networkInterfaces;
  }

  public function setScheduling(SmartSEO_Google_Service_Compute_Scheduling $scheduling)
  {
    $this->scheduling = $scheduling;
  }

  public function getScheduling()
  {
    return $this->scheduling;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setServiceAccounts($serviceAccounts)
  {
    $this->serviceAccounts = $serviceAccounts;
  }

  public function getServiceAccounts()
  {
    return $this->serviceAccounts;
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

  public function setTags(SmartSEO_Google_Service_Compute_Tags $tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
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

class SmartSEO_Google_Service_Compute_InstanceAggregatedList extends SmartSEO_Google_Model
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_InstancesScopedList';
  protected $itemsDataType = 'map';
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

class SmartSEO_Google_Service_Compute_InstanceAggregatedListItems extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_Compute_InstanceList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_Instance';
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

class SmartSEO_Google_Service_Compute_InstanceReference extends SmartSEO_Google_Model
{
  public $instance;

  public function setInstance($instance)
  {
    $this->instance = $instance;
  }

  public function getInstance()
  {
    return $this->instance;
  }
}

class SmartSEO_Google_Service_Compute_InstancesScopedList extends SmartSEO_Google_Collection
{
  protected $instancesType = 'SmartSEO_Google_Service_Compute_Instance';
  protected $instancesDataType = 'array';
  protected $warningType = 'SmartSEO_Google_Service_Compute_InstancesScopedListWarning';
  protected $warningDataType = '';

  public function setInstances($instances)
  {
    $this->instances = $instances;
  }

  public function getInstances()
  {
    return $this->instances;
  }

  public function setWarning(SmartSEO_Google_Service_Compute_InstancesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }

  public function getWarning()
  {
    return $this->warning;
  }
}

class SmartSEO_Google_Service_Compute_InstancesScopedListWarning extends SmartSEO_Google_Collection
{
  public $code;
  protected $dataType = 'SmartSEO_Google_Service_Compute_InstancesScopedListWarningData';
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

class SmartSEO_Google_Service_Compute_InstancesScopedListWarningData extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_License extends SmartSEO_Google_Model
{
  public $kind;
  public $name;
  public $selfLink;

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

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }
}

class SmartSEO_Google_Service_Compute_MachineType extends SmartSEO_Google_Collection
{
  public $creationTimestamp;
  protected $deprecatedType = 'SmartSEO_Google_Service_Compute_DeprecationStatus';
  protected $deprecatedDataType = '';
  public $description;
  public $guestCpus;
  public $id;
  public $imageSpaceGb;
  public $kind;
  public $maximumPersistentDisks;
  public $maximumPersistentDisksSizeGb;
  public $memoryMb;
  public $name;
  protected $scratchDisksType = 'SmartSEO_Google_Service_Compute_MachineTypeScratchDisks';
  protected $scratchDisksDataType = 'array';
  public $selfLink;
  public $zone;

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }

  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }

  public function setDeprecated(SmartSEO_Google_Service_Compute_DeprecationStatus $deprecated)
  {
    $this->deprecated = $deprecated;
  }

  public function getDeprecated()
  {
    return $this->deprecated;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setGuestCpus($guestCpus)
  {
    $this->guestCpus = $guestCpus;
  }

  public function getGuestCpus()
  {
    return $this->guestCpus;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setImageSpaceGb($imageSpaceGb)
  {
    $this->imageSpaceGb = $imageSpaceGb;
  }

  public function getImageSpaceGb()
  {
    return $this->imageSpaceGb;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setMaximumPersistentDisks($maximumPersistentDisks)
  {
    $this->maximumPersistentDisks = $maximumPersistentDisks;
  }

  public function getMaximumPersistentDisks()
  {
    return $this->maximumPersistentDisks;
  }

  public function setMaximumPersistentDisksSizeGb($maximumPersistentDisksSizeGb)
  {
    $this->maximumPersistentDisksSizeGb = $maximumPersistentDisksSizeGb;
  }

  public function getMaximumPersistentDisksSizeGb()
  {
    return $this->maximumPersistentDisksSizeGb;
  }

  public function setMemoryMb($memoryMb)
  {
    $this->memoryMb = $memoryMb;
  }

  public function getMemoryMb()
  {
    return $this->memoryMb;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setScratchDisks($scratchDisks)
  {
    $this->scratchDisks = $scratchDisks;
  }

  public function getScratchDisks()
  {
    return $this->scratchDisks;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
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

class SmartSEO_Google_Service_Compute_MachineTypeAggregatedList extends SmartSEO_Google_Model
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_MachineTypesScopedList';
  protected $itemsDataType = 'map';
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

class SmartSEO_Google_Service_Compute_MachineTypeAggregatedListItems extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_Compute_MachineTypeList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_MachineType';
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

class SmartSEO_Google_Service_Compute_MachineTypeScratchDisks extends SmartSEO_Google_Model
{
  public $diskGb;

  public function setDiskGb($diskGb)
  {
    $this->diskGb = $diskGb;
  }

  public function getDiskGb()
  {
    return $this->diskGb;
  }
}

class SmartSEO_Google_Service_Compute_MachineTypesScopedList extends SmartSEO_Google_Collection
{
  protected $machineTypesType = 'SmartSEO_Google_Service_Compute_MachineType';
  protected $machineTypesDataType = 'array';
  protected $warningType = 'SmartSEO_Google_Service_Compute_MachineTypesScopedListWarning';
  protected $warningDataType = '';

  public function setMachineTypes($machineTypes)
  {
    $this->machineTypes = $machineTypes;
  }

  public function getMachineTypes()
  {
    return $this->machineTypes;
  }

  public function setWarning(SmartSEO_Google_Service_Compute_MachineTypesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }

  public function getWarning()
  {
    return $this->warning;
  }
}

class SmartSEO_Google_Service_Compute_MachineTypesScopedListWarning extends SmartSEO_Google_Collection
{
  public $code;
  protected $dataType = 'SmartSEO_Google_Service_Compute_MachineTypesScopedListWarningData';
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

class SmartSEO_Google_Service_Compute_MachineTypesScopedListWarningData extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_Metadata extends SmartSEO_Google_Collection
{
  public $fingerprint;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_MetadataItems';
  protected $itemsDataType = 'array';
  public $kind;

  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }

  public function getFingerprint()
  {
    return $this->fingerprint;
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
}

class SmartSEO_Google_Service_Compute_MetadataItems extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_Network extends SmartSEO_Google_Model
{
  public $iPv4Range;
  public $creationTimestamp;
  public $description;
  public $gatewayIPv4;
  public $id;
  public $kind;
  public $name;
  public $selfLink;

  public function setIPv4Range($iPv4Range)
  {
    $this->iPv4Range = $iPv4Range;
  }

  public function getIPv4Range()
  {
    return $this->iPv4Range;
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

  public function setGatewayIPv4($gatewayIPv4)
  {
    $this->gatewayIPv4 = $gatewayIPv4;
  }

  public function getGatewayIPv4()
  {
    return $this->gatewayIPv4;
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
}

class SmartSEO_Google_Service_Compute_NetworkInterface extends SmartSEO_Google_Collection
{
  protected $accessConfigsType = 'SmartSEO_Google_Service_Compute_AccessConfig';
  protected $accessConfigsDataType = 'array';
  public $name;
  public $network;
  public $networkIP;

  public function setAccessConfigs($accessConfigs)
  {
    $this->accessConfigs = $accessConfigs;
  }

  public function getAccessConfigs()
  {
    return $this->accessConfigs;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setNetwork($network)
  {
    $this->network = $network;
  }

  public function getNetwork()
  {
    return $this->network;
  }

  public function setNetworkIP($networkIP)
  {
    $this->networkIP = $networkIP;
  }

  public function getNetworkIP()
  {
    return $this->networkIP;
  }
}

class SmartSEO_Google_Service_Compute_NetworkList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_Network';
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

class SmartSEO_Google_Service_Compute_Operation extends SmartSEO_Google_Collection
{
  public $clientOperationId;
  public $creationTimestamp;
  public $endTime;
  protected $errorType = 'SmartSEO_Google_Service_Compute_OperationError';
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
  protected $warningsType = 'SmartSEO_Google_Service_Compute_OperationWarnings';
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

  public function setError(SmartSEO_Google_Service_Compute_OperationError $error)
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

class SmartSEO_Google_Service_Compute_OperationAggregatedList extends SmartSEO_Google_Model
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_OperationsScopedList';
  protected $itemsDataType = 'map';
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

class SmartSEO_Google_Service_Compute_OperationAggregatedListItems extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_Compute_OperationError extends SmartSEO_Google_Collection
{
  protected $errorsType = 'SmartSEO_Google_Service_Compute_OperationErrorErrors';
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

class SmartSEO_Google_Service_Compute_OperationErrorErrors extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_OperationList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_Operation';
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

class SmartSEO_Google_Service_Compute_OperationWarnings extends SmartSEO_Google_Collection
{
  public $code;
  protected $dataType = 'SmartSEO_Google_Service_Compute_OperationWarningsData';
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

class SmartSEO_Google_Service_Compute_OperationWarningsData extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_OperationsScopedList extends SmartSEO_Google_Collection
{
  protected $operationsType = 'SmartSEO_Google_Service_Compute_Operation';
  protected $operationsDataType = 'array';
  protected $warningType = 'SmartSEO_Google_Service_Compute_OperationsScopedListWarning';
  protected $warningDataType = '';

  public function setOperations($operations)
  {
    $this->operations = $operations;
  }

  public function getOperations()
  {
    return $this->operations;
  }

  public function setWarning(SmartSEO_Google_Service_Compute_OperationsScopedListWarning $warning)
  {
    $this->warning = $warning;
  }

  public function getWarning()
  {
    return $this->warning;
  }
}

class SmartSEO_Google_Service_Compute_OperationsScopedListWarning extends SmartSEO_Google_Collection
{
  public $code;
  protected $dataType = 'SmartSEO_Google_Service_Compute_OperationsScopedListWarningData';
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

class SmartSEO_Google_Service_Compute_OperationsScopedListWarningData extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_PathMatcher extends SmartSEO_Google_Collection
{
  public $defaultService;
  public $description;
  public $name;
  protected $pathRulesType = 'SmartSEO_Google_Service_Compute_PathRule';
  protected $pathRulesDataType = 'array';

  public function setDefaultService($defaultService)
  {
    $this->defaultService = $defaultService;
  }

  public function getDefaultService()
  {
    return $this->defaultService;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setPathRules($pathRules)
  {
    $this->pathRules = $pathRules;
  }

  public function getPathRules()
  {
    return $this->pathRules;
  }
}

class SmartSEO_Google_Service_Compute_PathRule extends SmartSEO_Google_Collection
{
  public $paths;
  public $service;

  public function setPaths($paths)
  {
    $this->paths = $paths;
  }

  public function getPaths()
  {
    return $this->paths;
  }

  public function setService($service)
  {
    $this->service = $service;
  }

  public function getService()
  {
    return $this->service;
  }
}

class SmartSEO_Google_Service_Compute_Project extends SmartSEO_Google_Collection
{
  protected $commonInstanceMetadataType = 'SmartSEO_Google_Service_Compute_Metadata';
  protected $commonInstanceMetadataDataType = '';
  public $creationTimestamp;
  public $description;
  public $id;
  public $kind;
  public $name;
  protected $quotasType = 'SmartSEO_Google_Service_Compute_Quota';
  protected $quotasDataType = 'array';
  public $selfLink;
  protected $usageExportLocationType = 'SmartSEO_Google_Service_Compute_UsageExportLocation';
  protected $usageExportLocationDataType = '';

  public function setCommonInstanceMetadata(SmartSEO_Google_Service_Compute_Metadata $commonInstanceMetadata)
  {
    $this->commonInstanceMetadata = $commonInstanceMetadata;
  }

  public function getCommonInstanceMetadata()
  {
    return $this->commonInstanceMetadata;
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

  public function setQuotas($quotas)
  {
    $this->quotas = $quotas;
  }

  public function getQuotas()
  {
    return $this->quotas;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setUsageExportLocation(SmartSEO_Google_Service_Compute_UsageExportLocation $usageExportLocation)
  {
    $this->usageExportLocation = $usageExportLocation;
  }

  public function getUsageExportLocation()
  {
    return $this->usageExportLocation;
  }
}

class SmartSEO_Google_Service_Compute_Quota extends SmartSEO_Google_Model
{
  public $limit;
  public $metric;
  public $usage;

  public function setLimit($limit)
  {
    $this->limit = $limit;
  }

  public function getLimit()
  {
    return $this->limit;
  }

  public function setMetric($metric)
  {
    $this->metric = $metric;
  }

  public function getMetric()
  {
    return $this->metric;
  }

  public function setUsage($usage)
  {
    $this->usage = $usage;
  }

  public function getUsage()
  {
    return $this->usage;
  }
}

class SmartSEO_Google_Service_Compute_Region extends SmartSEO_Google_Collection
{
  public $creationTimestamp;
  protected $deprecatedType = 'SmartSEO_Google_Service_Compute_DeprecationStatus';
  protected $deprecatedDataType = '';
  public $description;
  public $id;
  public $kind;
  public $name;
  protected $quotasType = 'SmartSEO_Google_Service_Compute_Quota';
  protected $quotasDataType = 'array';
  public $selfLink;
  public $status;
  public $zones;

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }

  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }

  public function setDeprecated(SmartSEO_Google_Service_Compute_DeprecationStatus $deprecated)
  {
    $this->deprecated = $deprecated;
  }

  public function getDeprecated()
  {
    return $this->deprecated;
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

  public function setQuotas($quotas)
  {
    $this->quotas = $quotas;
  }

  public function getQuotas()
  {
    return $this->quotas;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setZones($zones)
  {
    $this->zones = $zones;
  }

  public function getZones()
  {
    return $this->zones;
  }
}

class SmartSEO_Google_Service_Compute_RegionList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_Region';
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

class SmartSEO_Google_Service_Compute_ResourceGroupReference extends SmartSEO_Google_Model
{
  public $group;

  public function setGroup($group)
  {
    $this->group = $group;
  }

  public function getGroup()
  {
    return $this->group;
  }
}

class SmartSEO_Google_Service_Compute_Route extends SmartSEO_Google_Collection
{
  public $creationTimestamp;
  public $description;
  public $destRange;
  public $id;
  public $kind;
  public $name;
  public $network;
  public $nextHopGateway;
  public $nextHopInstance;
  public $nextHopIp;
  public $nextHopNetwork;
  public $priority;
  public $selfLink;
  public $tags;
  protected $warningsType = 'SmartSEO_Google_Service_Compute_RouteWarnings';
  protected $warningsDataType = 'array';

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

  public function setDestRange($destRange)
  {
    $this->destRange = $destRange;
  }

  public function getDestRange()
  {
    return $this->destRange;
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

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setNetwork($network)
  {
    $this->network = $network;
  }

  public function getNetwork()
  {
    return $this->network;
  }

  public function setNextHopGateway($nextHopGateway)
  {
    $this->nextHopGateway = $nextHopGateway;
  }

  public function getNextHopGateway()
  {
    return $this->nextHopGateway;
  }

  public function setNextHopInstance($nextHopInstance)
  {
    $this->nextHopInstance = $nextHopInstance;
  }

  public function getNextHopInstance()
  {
    return $this->nextHopInstance;
  }

  public function setNextHopIp($nextHopIp)
  {
    $this->nextHopIp = $nextHopIp;
  }

  public function getNextHopIp()
  {
    return $this->nextHopIp;
  }

  public function setNextHopNetwork($nextHopNetwork)
  {
    $this->nextHopNetwork = $nextHopNetwork;
  }

  public function getNextHopNetwork()
  {
    return $this->nextHopNetwork;
  }

  public function setPriority($priority)
  {
    $this->priority = $priority;
  }

  public function getPriority()
  {
    return $this->priority;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }

  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }

  public function getWarnings()
  {
    return $this->warnings;
  }
}

class SmartSEO_Google_Service_Compute_RouteList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_Route';
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

class SmartSEO_Google_Service_Compute_RouteWarnings extends SmartSEO_Google_Collection
{
  public $code;
  protected $dataType = 'SmartSEO_Google_Service_Compute_RouteWarningsData';
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

class SmartSEO_Google_Service_Compute_RouteWarningsData extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_Scheduling extends SmartSEO_Google_Model
{
  public $automaticRestart;
  public $onHostMaintenance;

  public function setAutomaticRestart($automaticRestart)
  {
    $this->automaticRestart = $automaticRestart;
  }

  public function getAutomaticRestart()
  {
    return $this->automaticRestart;
  }

  public function setOnHostMaintenance($onHostMaintenance)
  {
    $this->onHostMaintenance = $onHostMaintenance;
  }

  public function getOnHostMaintenance()
  {
    return $this->onHostMaintenance;
  }
}

class SmartSEO_Google_Service_Compute_SerialPortOutput extends SmartSEO_Google_Model
{
  public $contents;
  public $kind;
  public $selfLink;

  public function setContents($contents)
  {
    $this->contents = $contents;
  }

  public function getContents()
  {
    return $this->contents;
  }

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
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

class SmartSEO_Google_Service_Compute_ServiceAccount extends SmartSEO_Google_Collection
{
  public $email;
  public $scopes;

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setScopes($scopes)
  {
    $this->scopes = $scopes;
  }

  public function getScopes()
  {
    return $this->scopes;
  }
}

class SmartSEO_Google_Service_Compute_Snapshot extends SmartSEO_Google_Collection
{
  public $creationTimestamp;
  public $description;
  public $diskSizeGb;
  public $id;
  public $kind;
  public $licenses;
  public $name;
  public $selfLink;
  public $sourceDisk;
  public $sourceDiskId;
  public $status;
  public $storageBytes;
  public $storageBytesStatus;

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

  public function setDiskSizeGb($diskSizeGb)
  {
    $this->diskSizeGb = $diskSizeGb;
  }

  public function getDiskSizeGb()
  {
    return $this->diskSizeGb;
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

  public function setLicenses($licenses)
  {
    $this->licenses = $licenses;
  }

  public function getLicenses()
  {
    return $this->licenses;
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

  public function setSourceDisk($sourceDisk)
  {
    $this->sourceDisk = $sourceDisk;
  }

  public function getSourceDisk()
  {
    return $this->sourceDisk;
  }

  public function setSourceDiskId($sourceDiskId)
  {
    $this->sourceDiskId = $sourceDiskId;
  }

  public function getSourceDiskId()
  {
    return $this->sourceDiskId;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setStorageBytes($storageBytes)
  {
    $this->storageBytes = $storageBytes;
  }

  public function getStorageBytes()
  {
    return $this->storageBytes;
  }

  public function setStorageBytesStatus($storageBytesStatus)
  {
    $this->storageBytesStatus = $storageBytesStatus;
  }

  public function getStorageBytesStatus()
  {
    return $this->storageBytesStatus;
  }
}

class SmartSEO_Google_Service_Compute_SnapshotList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_Snapshot';
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

class SmartSEO_Google_Service_Compute_Tags extends SmartSEO_Google_Collection
{
  public $fingerprint;
  public $items;

  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }

  public function getFingerprint()
  {
    return $this->fingerprint;
  }

  public function setItems($items)
  {
    $this->items = $items;
  }

  public function getItems()
  {
    return $this->items;
  }
}

class SmartSEO_Google_Service_Compute_TargetHttpProxy extends SmartSEO_Google_Model
{
  public $creationTimestamp;
  public $description;
  public $id;
  public $kind;
  public $name;
  public $selfLink;
  public $urlMap;

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

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setUrlMap($urlMap)
  {
    $this->urlMap = $urlMap;
  }

  public function getUrlMap()
  {
    return $this->urlMap;
  }
}

class SmartSEO_Google_Service_Compute_TargetHttpProxyList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_TargetHttpProxy';
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

class SmartSEO_Google_Service_Compute_TargetInstance extends SmartSEO_Google_Model
{
  public $creationTimestamp;
  public $description;
  public $id;
  public $instance;
  public $kind;
  public $name;
  public $natPolicy;
  public $selfLink;
  public $zone;

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

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setNatPolicy($natPolicy)
  {
    $this->natPolicy = $natPolicy;
  }

  public function getNatPolicy()
  {
    return $this->natPolicy;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
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

class SmartSEO_Google_Service_Compute_TargetInstanceAggregatedList extends SmartSEO_Google_Model
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_TargetInstancesScopedList';
  protected $itemsDataType = 'map';
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

class SmartSEO_Google_Service_Compute_TargetInstanceAggregatedListItems extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_Compute_TargetInstanceList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_TargetInstance';
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

class SmartSEO_Google_Service_Compute_TargetInstancesScopedList extends SmartSEO_Google_Collection
{
  protected $targetInstancesType = 'SmartSEO_Google_Service_Compute_TargetInstance';
  protected $targetInstancesDataType = 'array';
  protected $warningType = 'SmartSEO_Google_Service_Compute_TargetInstancesScopedListWarning';
  protected $warningDataType = '';

  public function setTargetInstances($targetInstances)
  {
    $this->targetInstances = $targetInstances;
  }

  public function getTargetInstances()
  {
    return $this->targetInstances;
  }

  public function setWarning(SmartSEO_Google_Service_Compute_TargetInstancesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }

  public function getWarning()
  {
    return $this->warning;
  }
}

class SmartSEO_Google_Service_Compute_TargetInstancesScopedListWarning extends SmartSEO_Google_Collection
{
  public $code;
  protected $dataType = 'SmartSEO_Google_Service_Compute_TargetInstancesScopedListWarningData';
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

class SmartSEO_Google_Service_Compute_TargetInstancesScopedListWarningData extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_TargetPool extends SmartSEO_Google_Collection
{
  public $backupPool;
  public $creationTimestamp;
  public $description;
  public $failoverRatio;
  public $healthChecks;
  public $id;
  public $instances;
  public $kind;
  public $name;
  public $region;
  public $selfLink;
  public $sessionAffinity;

  public function setBackupPool($backupPool)
  {
    $this->backupPool = $backupPool;
  }

  public function getBackupPool()
  {
    return $this->backupPool;
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

  public function setFailoverRatio($failoverRatio)
  {
    $this->failoverRatio = $failoverRatio;
  }

  public function getFailoverRatio()
  {
    return $this->failoverRatio;
  }

  public function setHealthChecks($healthChecks)
  {
    $this->healthChecks = $healthChecks;
  }

  public function getHealthChecks()
  {
    return $this->healthChecks;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setInstances($instances)
  {
    $this->instances = $instances;
  }

  public function getInstances()
  {
    return $this->instances;
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

  public function setSessionAffinity($sessionAffinity)
  {
    $this->sessionAffinity = $sessionAffinity;
  }

  public function getSessionAffinity()
  {
    return $this->sessionAffinity;
  }
}

class SmartSEO_Google_Service_Compute_TargetPoolAggregatedList extends SmartSEO_Google_Model
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_TargetPoolsScopedList';
  protected $itemsDataType = 'map';
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

class SmartSEO_Google_Service_Compute_TargetPoolAggregatedListItems extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_Compute_TargetPoolInstanceHealth extends SmartSEO_Google_Collection
{
  protected $healthStatusType = 'SmartSEO_Google_Service_Compute_HealthStatus';
  protected $healthStatusDataType = 'array';
  public $kind;

  public function setHealthStatus($healthStatus)
  {
    $this->healthStatus = $healthStatus;
  }

  public function getHealthStatus()
  {
    return $this->healthStatus;
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

class SmartSEO_Google_Service_Compute_TargetPoolList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_TargetPool';
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

class SmartSEO_Google_Service_Compute_TargetPoolsAddHealthCheckRequest extends SmartSEO_Google_Collection
{
  protected $healthChecksType = 'SmartSEO_Google_Service_Compute_HealthCheckReference';
  protected $healthChecksDataType = 'array';

  public function setHealthChecks($healthChecks)
  {
    $this->healthChecks = $healthChecks;
  }

  public function getHealthChecks()
  {
    return $this->healthChecks;
  }
}

class SmartSEO_Google_Service_Compute_TargetPoolsAddInstanceRequest extends SmartSEO_Google_Collection
{
  protected $instancesType = 'SmartSEO_Google_Service_Compute_InstanceReference';
  protected $instancesDataType = 'array';

  public function setInstances($instances)
  {
    $this->instances = $instances;
  }

  public function getInstances()
  {
    return $this->instances;
  }
}

class SmartSEO_Google_Service_Compute_TargetPoolsRemoveHealthCheckRequest extends SmartSEO_Google_Collection
{
  protected $healthChecksType = 'SmartSEO_Google_Service_Compute_HealthCheckReference';
  protected $healthChecksDataType = 'array';

  public function setHealthChecks($healthChecks)
  {
    $this->healthChecks = $healthChecks;
  }

  public function getHealthChecks()
  {
    return $this->healthChecks;
  }
}

class SmartSEO_Google_Service_Compute_TargetPoolsRemoveInstanceRequest extends SmartSEO_Google_Collection
{
  protected $instancesType = 'SmartSEO_Google_Service_Compute_InstanceReference';
  protected $instancesDataType = 'array';

  public function setInstances($instances)
  {
    $this->instances = $instances;
  }

  public function getInstances()
  {
    return $this->instances;
  }
}

class SmartSEO_Google_Service_Compute_TargetPoolsScopedList extends SmartSEO_Google_Collection
{
  protected $targetPoolsType = 'SmartSEO_Google_Service_Compute_TargetPool';
  protected $targetPoolsDataType = 'array';
  protected $warningType = 'SmartSEO_Google_Service_Compute_TargetPoolsScopedListWarning';
  protected $warningDataType = '';

  public function setTargetPools($targetPools)
  {
    $this->targetPools = $targetPools;
  }

  public function getTargetPools()
  {
    return $this->targetPools;
  }

  public function setWarning(SmartSEO_Google_Service_Compute_TargetPoolsScopedListWarning $warning)
  {
    $this->warning = $warning;
  }

  public function getWarning()
  {
    return $this->warning;
  }
}

class SmartSEO_Google_Service_Compute_TargetPoolsScopedListWarning extends SmartSEO_Google_Collection
{
  public $code;
  protected $dataType = 'SmartSEO_Google_Service_Compute_TargetPoolsScopedListWarningData';
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

class SmartSEO_Google_Service_Compute_TargetPoolsScopedListWarningData extends SmartSEO_Google_Model
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

class SmartSEO_Google_Service_Compute_TargetReference extends SmartSEO_Google_Model
{
  public $target;

  public function setTarget($target)
  {
    $this->target = $target;
  }

  public function getTarget()
  {
    return $this->target;
  }
}

class SmartSEO_Google_Service_Compute_TestFailure extends SmartSEO_Google_Model
{
  public $actualService;
  public $expectedService;
  public $host;
  public $path;

  public function setActualService($actualService)
  {
    $this->actualService = $actualService;
  }

  public function getActualService()
  {
    return $this->actualService;
  }

  public function setExpectedService($expectedService)
  {
    $this->expectedService = $expectedService;
  }

  public function getExpectedService()
  {
    return $this->expectedService;
  }

  public function setHost($host)
  {
    $this->host = $host;
  }

  public function getHost()
  {
    return $this->host;
  }

  public function setPath($path)
  {
    $this->path = $path;
  }

  public function getPath()
  {
    return $this->path;
  }
}

class SmartSEO_Google_Service_Compute_UrlMap extends SmartSEO_Google_Collection
{
  public $creationTimestamp;
  public $defaultService;
  public $description;
  public $fingerprint;
  protected $hostRulesType = 'SmartSEO_Google_Service_Compute_HostRule';
  protected $hostRulesDataType = 'array';
  public $id;
  public $kind;
  public $name;
  protected $pathMatchersType = 'SmartSEO_Google_Service_Compute_PathMatcher';
  protected $pathMatchersDataType = 'array';
  public $selfLink;
  protected $testsType = 'SmartSEO_Google_Service_Compute_UrlMapTest';
  protected $testsDataType = 'array';

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }

  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }

  public function setDefaultService($defaultService)
  {
    $this->defaultService = $defaultService;
  }

  public function getDefaultService()
  {
    return $this->defaultService;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }

  public function getFingerprint()
  {
    return $this->fingerprint;
  }

  public function setHostRules($hostRules)
  {
    $this->hostRules = $hostRules;
  }

  public function getHostRules()
  {
    return $this->hostRules;
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

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setPathMatchers($pathMatchers)
  {
    $this->pathMatchers = $pathMatchers;
  }

  public function getPathMatchers()
  {
    return $this->pathMatchers;
  }

  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }

  public function getSelfLink()
  {
    return $this->selfLink;
  }

  public function setTests($tests)
  {
    $this->tests = $tests;
  }

  public function getTests()
  {
    return $this->tests;
  }
}

class SmartSEO_Google_Service_Compute_UrlMapList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_UrlMap';
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

class SmartSEO_Google_Service_Compute_UrlMapReference extends SmartSEO_Google_Model
{
  public $urlMap;

  public function setUrlMap($urlMap)
  {
    $this->urlMap = $urlMap;
  }

  public function getUrlMap()
  {
    return $this->urlMap;
  }
}

class SmartSEO_Google_Service_Compute_UrlMapTest extends SmartSEO_Google_Model
{
  public $description;
  public $host;
  public $path;
  public $service;

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setHost($host)
  {
    $this->host = $host;
  }

  public function getHost()
  {
    return $this->host;
  }

  public function setPath($path)
  {
    $this->path = $path;
  }

  public function getPath()
  {
    return $this->path;
  }

  public function setService($service)
  {
    $this->service = $service;
  }

  public function getService()
  {
    return $this->service;
  }
}

class SmartSEO_Google_Service_Compute_UrlMapValidationResult extends SmartSEO_Google_Collection
{
  public $loadErrors;
  public $loadSucceeded;
  protected $testFailuresType = 'SmartSEO_Google_Service_Compute_TestFailure';
  protected $testFailuresDataType = 'array';
  public $testPassed;

  public function setLoadErrors($loadErrors)
  {
    $this->loadErrors = $loadErrors;
  }

  public function getLoadErrors()
  {
    return $this->loadErrors;
  }

  public function setLoadSucceeded($loadSucceeded)
  {
    $this->loadSucceeded = $loadSucceeded;
  }

  public function getLoadSucceeded()
  {
    return $this->loadSucceeded;
  }

  public function setTestFailures($testFailures)
  {
    $this->testFailures = $testFailures;
  }

  public function getTestFailures()
  {
    return $this->testFailures;
  }

  public function setTestPassed($testPassed)
  {
    $this->testPassed = $testPassed;
  }

  public function getTestPassed()
  {
    return $this->testPassed;
  }
}

class SmartSEO_Google_Service_Compute_UrlMapsValidateRequest extends SmartSEO_Google_Model
{
  protected $resourceType = 'SmartSEO_Google_Service_Compute_UrlMap';
  protected $resourceDataType = '';

  public function setResource(SmartSEO_Google_Service_Compute_UrlMap $resource)
  {
    $this->resource = $resource;
  }

  public function getResource()
  {
    return $this->resource;
  }
}

class SmartSEO_Google_Service_Compute_UrlMapsValidateResponse extends SmartSEO_Google_Model
{
  protected $resultType = 'SmartSEO_Google_Service_Compute_UrlMapValidationResult';
  protected $resultDataType = '';

  public function setResult(SmartSEO_Google_Service_Compute_UrlMapValidationResult $result)
  {
    $this->result = $result;
  }

  public function getResult()
  {
    return $this->result;
  }
}

class SmartSEO_Google_Service_Compute_UsageExportLocation extends SmartSEO_Google_Model
{
  public $bucketName;
  public $reportNamePrefix;

  public function setBucketName($bucketName)
  {
    $this->bucketName = $bucketName;
  }

  public function getBucketName()
  {
    return $this->bucketName;
  }

  public function setReportNamePrefix($reportNamePrefix)
  {
    $this->reportNamePrefix = $reportNamePrefix;
  }

  public function getReportNamePrefix()
  {
    return $this->reportNamePrefix;
  }
}

class SmartSEO_Google_Service_Compute_Zone extends SmartSEO_Google_Collection
{
  public $creationTimestamp;
  protected $deprecatedType = 'SmartSEO_Google_Service_Compute_DeprecationStatus';
  protected $deprecatedDataType = '';
  public $description;
  public $id;
  public $kind;
  protected $maintenanceWindowsType = 'SmartSEO_Google_Service_Compute_ZoneMaintenanceWindows';
  protected $maintenanceWindowsDataType = 'array';
  public $name;
  public $region;
  public $selfLink;
  public $status;

  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }

  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }

  public function setDeprecated(SmartSEO_Google_Service_Compute_DeprecationStatus $deprecated)
  {
    $this->deprecated = $deprecated;
  }

  public function getDeprecated()
  {
    return $this->deprecated;
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

  public function setKind($kind)
  {
    $this->kind = $kind;
  }

  public function getKind()
  {
    return $this->kind;
  }

  public function setMaintenanceWindows($maintenanceWindows)
  {
    $this->maintenanceWindows = $maintenanceWindows;
  }

  public function getMaintenanceWindows()
  {
    return $this->maintenanceWindows;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
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

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getStatus()
  {
    return $this->status;
  }
}

class SmartSEO_Google_Service_Compute_ZoneList extends SmartSEO_Google_Collection
{
  public $id;
  protected $itemsType = 'SmartSEO_Google_Service_Compute_Zone';
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

class SmartSEO_Google_Service_Compute_ZoneMaintenanceWindows extends SmartSEO_Google_Model
{
  public $beginTime;
  public $description;
  public $endTime;
  public $name;

  public function setBeginTime($beginTime)
  {
    $this->beginTime = $beginTime;
  }

  public function getBeginTime()
  {
    return $this->beginTime;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }

  public function getEndTime()
  {
    return $this->endTime;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }
}
