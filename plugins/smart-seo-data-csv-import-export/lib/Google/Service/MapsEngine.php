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
 * Service definition for MapsEngine (v1).
 *
 * <p>
 * The Google Maps Engine API allows developers to store and query geospatial vector and raster data.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/maps-engine/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class SmartSEO_Google_Service_MapsEngine extends SmartSEO_Google_Service
{
  /** View and manage your Google Maps Engine data. */
  const MAPSENGINE = "https://www.googleapis.com/auth/mapsengine";
  /** View your Google Maps Engine data. */
  const MAPSENGINE_READONLY = "https://www.googleapis.com/auth/mapsengine.readonly";

  public $assets;
  public $assets_parents;
  public $layers;
  public $layers_parents;
  public $maps;
  public $projects;
  public $rasterCollections;
  public $rasterCollections_parents;
  public $rasterCollections_rasters;
  public $rasters;
  public $rasters_files;
  public $rasters_parents;
  public $tables;
  public $tables_features;
  public $tables_files;
  public $tables_parents;
  

  /**
   * Constructs the internal representation of the MapsEngine service.
   *
   * @param SmartSEO_Google_Client $client
   */
  public function __construct(SmartSEO_Google_Client $client)
  {
    parent::__construct($client);
    $this->servicePath = 'mapsengine/v1/';
    $this->version = 'v1';
    $this->serviceName = 'mapsengine';

    $this->assets = new SmartSEO_Google_Service_MapsEngine_Assets_Resource(
        $this,
        $this->serviceName,
        'assets',
        array(
          'methods' => array(
            'get' => array(
              'path' => 'assets/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'assets',
              'httpMethod' => 'GET',
              'parameters' => array(
                'modifiedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'tags' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creatorEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'bbox' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'type' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->assets_parents = new SmartSEO_Google_Service_MapsEngine_AssetsParents_Resource(
        $this,
        $this->serviceName,
        'parents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'assets/{id}/parents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
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
            ),
          )
        )
    );
    $this->layers = new SmartSEO_Google_Service_MapsEngine_Layers_Resource(
        $this,
        $this->serviceName,
        'layers',
        array(
          'methods' => array(
            'cancelProcessing' => array(
              'path' => 'layers/{id}/cancelProcessing',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'layers',
              'httpMethod' => 'POST',
              'parameters' => array(
                'process' => array(
                  'location' => 'query',
                  'type' => 'boolean',
                ),
              ),
            ),'delete' => array(
              'path' => 'layers/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'layers/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'version' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'layers',
              'httpMethod' => 'GET',
              'parameters' => array(
                'modifiedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'tags' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creatorEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'bbox' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'layers/{id}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'process' => array(
              'path' => 'layers/{id}/process',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'publish' => array(
              'path' => 'layers/{id}/publish',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'unpublish' => array(
              'path' => 'layers/{id}/unpublish',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->layers_parents = new SmartSEO_Google_Service_MapsEngine_LayersParents_Resource(
        $this,
        $this->serviceName,
        'parents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'layers/{id}/parents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
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
            ),
          )
        )
    );
    $this->maps = new SmartSEO_Google_Service_MapsEngine_Maps_Resource(
        $this,
        $this->serviceName,
        'maps',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'maps',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'maps/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'maps/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'version' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'maps',
              'httpMethod' => 'GET',
              'parameters' => array(
                'modifiedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'tags' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creatorEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'bbox' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'maps/{id}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'publish' => array(
              'path' => 'maps/{id}/publish',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'unpublish' => array(
              'path' => 'maps/{id}/unpublish',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->projects = new SmartSEO_Google_Service_MapsEngine_Projects_Resource(
        $this,
        $this->serviceName,
        'projects',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'projects',
              'httpMethod' => 'GET',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->rasterCollections = new SmartSEO_Google_Service_MapsEngine_RasterCollections_Resource(
        $this,
        $this->serviceName,
        'rasterCollections',
        array(
          'methods' => array(
            'cancelProcessing' => array(
              'path' => 'rasterCollections/{id}/cancelProcessing',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'create' => array(
              'path' => 'rasterCollections',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'rasterCollections/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'rasterCollections/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'rasterCollections',
              'httpMethod' => 'GET',
              'parameters' => array(
                'modifiedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'tags' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creatorEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'bbox' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'rasterCollections/{id}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'process' => array(
              'path' => 'rasterCollections/{id}/process',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->rasterCollections_parents = new SmartSEO_Google_Service_MapsEngine_RasterCollectionsParents_Resource(
        $this,
        $this->serviceName,
        'parents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'rasterCollections/{id}/parents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
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
            ),
          )
        )
    );
    $this->rasterCollections_rasters = new SmartSEO_Google_Service_MapsEngine_RasterCollectionsRasters_Resource(
        $this,
        $this->serviceName,
        'rasters',
        array(
          'methods' => array(
            'batchDelete' => array(
              'path' => 'rasterCollections/{id}/rasters/batchDelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchInsert' => array(
              'path' => 'rasterCollections/{id}/rasters/batchInsert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'list' => array(
              'path' => 'rasterCollections/{id}/rasters',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'modifiedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'tags' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creatorEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'bbox' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->rasters = new SmartSEO_Google_Service_MapsEngine_Rasters_Resource(
        $this,
        $this->serviceName,
        'rasters',
        array(
          'methods' => array(
            'delete' => array(
              'path' => 'rasters/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'rasters/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'patch' => array(
              'path' => 'rasters/{id}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'upload' => array(
              'path' => 'rasters/upload',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->rasters_files = new SmartSEO_Google_Service_MapsEngine_RastersFiles_Resource(
        $this,
        $this->serviceName,
        'files',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'rasters/{id}/files',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filename' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->rasters_parents = new SmartSEO_Google_Service_MapsEngine_RastersParents_Resource(
        $this,
        $this->serviceName,
        'parents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'rasters/{id}/parents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
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
            ),
          )
        )
    );
    $this->tables = new SmartSEO_Google_Service_MapsEngine_Tables_Resource(
        $this,
        $this->serviceName,
        'tables',
        array(
          'methods' => array(
            'create' => array(
              'path' => 'tables',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),'delete' => array(
              'path' => 'tables/{id}',
              'httpMethod' => 'DELETE',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tables/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'version' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'tables',
              'httpMethod' => 'GET',
              'parameters' => array(
                'modifiedAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdAfter' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'tags' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'projectId' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'creatorEmail' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'bbox' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'modifiedBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'createdBefore' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'patch' => array(
              'path' => 'tables/{id}',
              'httpMethod' => 'PATCH',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'upload' => array(
              'path' => 'tables/upload',
              'httpMethod' => 'POST',
              'parameters' => array(),
            ),
          )
        )
    );
    $this->tables_features = new SmartSEO_Google_Service_MapsEngine_TablesFeatures_Resource(
        $this,
        $this->serviceName,
        'features',
        array(
          'methods' => array(
            'batchDelete' => array(
              'path' => 'tables/{id}/features/batchDelete',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchInsert' => array(
              'path' => 'tables/{id}/features/batchInsert',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'batchPatch' => array(
              'path' => 'tables/{id}/features/batchPatch',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),'get' => array(
              'path' => 'tables/{tableId}/features/{id}',
              'httpMethod' => 'GET',
              'parameters' => array(
                'tableId' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'version' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'select' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),'list' => array(
              'path' => 'tables/{id}/features',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'orderBy' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'intersects' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'maxResults' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'pageToken' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'version' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'limit' => array(
                  'location' => 'query',
                  'type' => 'integer',
                ),
                'include' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'where' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
                'select' => array(
                  'location' => 'query',
                  'type' => 'string',
                ),
              ),
            ),
          )
        )
    );
    $this->tables_files = new SmartSEO_Google_Service_MapsEngine_TablesFiles_Resource(
        $this,
        $this->serviceName,
        'files',
        array(
          'methods' => array(
            'insert' => array(
              'path' => 'tables/{id}/files',
              'httpMethod' => 'POST',
              'parameters' => array(
                'id' => array(
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ),
                'filename' => array(
                  'location' => 'query',
                  'type' => 'string',
                  'required' => true,
                ),
              ),
            ),
          )
        )
    );
    $this->tables_parents = new SmartSEO_Google_Service_MapsEngine_TablesParents_Resource(
        $this,
        $this->serviceName,
        'parents',
        array(
          'methods' => array(
            'list' => array(
              'path' => 'tables/{id}/parents',
              'httpMethod' => 'GET',
              'parameters' => array(
                'id' => array(
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
            ),
          )
        )
    );
  }
}


/**
 * The "assets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $assets = $mapsengineService->assets;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_Assets_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Return metadata for a particular asset. (assets.get)
   *
   * @param string $id
   * The ID of the asset.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_Asset
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_MapsEngine_Asset");
  }
  /**
   * Return all assets readable by the current user. (assets.listAssets)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string modifiedAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or after this time.
   * @opt_param string createdAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or after this time.
   * @opt_param string tags
   * A comma separated list of tags. Returned assets will contain all the tags from the list.
   * @opt_param string projectId
   * The ID of a Maps Engine project, used to filter the response. To list all available projects
    * with their IDs, send a Projects: list request. You can also find your project ID as the value of
    * the DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 100.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string creatorEmail
   * An email address representing a user. Returned assets that have been created by the user
    * associated with the provided email address.
   * @opt_param string bbox
   * A bounding box, expressed as "west,south,east,north". If set, only assets which intersect this
    * bounding box will be returned.
   * @opt_param string modifiedBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or before this time.
   * @opt_param string createdBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or before this time.
   * @opt_param string type
   * An asset type restriction. If set, only resources of this type will be returned.
   * @return SmartSEO_Google_Service_MapsEngine_AssetsListResponse
   */
  public function listAssets($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_AssetsListResponse");
  }
}

/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_AssetsParents_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Return all parent ids of the specified asset. (parents.listAssetsParents)
   *
   * @param string $id
   * The ID of the asset whose parents will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 50.
   * @return SmartSEO_Google_Service_MapsEngine_ParentsListResponse
   */
  public function listAssetsParents($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_ParentsListResponse");
  }
}

/**
 * The "layers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $layers = $mapsengineService->layers;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_Layers_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Cancel processing on a layer asset. (layers.cancelProcessing)
   *
   * @param string $id
   * The ID of the layer.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_ProcessResponse
   */
  public function cancelProcessing($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('cancelProcessing', array($params), "SmartSEO_Google_Service_MapsEngine_ProcessResponse");
  }
  /**
   * Create a layer asset. (layers.create)
   *
   * @param SmartSEO_Google_Layer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool process
   * Whether to queue the created layer for processing.
   * @return SmartSEO_Google_Service_MapsEngine_Layer
   */
  public function create(SmartSEO_Google_Service_MapsEngine_Layer $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "SmartSEO_Google_Service_MapsEngine_Layer");
  }
  /**
   * Delete a layer. (layers.delete)
   *
   * @param string $id
   * The ID of the layer. Only the layer creator or project owner are permitted to delete. If the
    * layer is published, or included in a map, the request will fail. Unpublish the layer, and remove
    * it from all maps prior to deleting.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Return metadata for a particular layer. (layers.get)
   *
   * @param string $id
   * The ID of the layer.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string version
   *
   * @return SmartSEO_Google_Service_MapsEngine_Layer
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_MapsEngine_Layer");
  }
  /**
   * Return all layers readable by the current user. (layers.listLayers)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string modifiedAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or after this time.
   * @opt_param string createdAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or after this time.
   * @opt_param string tags
   * A comma separated list of tags. Returned assets will contain all the tags from the list.
   * @opt_param string projectId
   * The ID of a Maps Engine project, used to filter the response. To list all available projects
    * with their IDs, send a Projects: list request. You can also find your project ID as the value of
    * the DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 100.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string creatorEmail
   * An email address representing a user. Returned assets that have been created by the user
    * associated with the provided email address.
   * @opt_param string bbox
   * A bounding box, expressed as "west,south,east,north". If set, only assets which intersect this
    * bounding box will be returned.
   * @opt_param string modifiedBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or before this time.
   * @opt_param string createdBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or before this time.
   * @return SmartSEO_Google_Service_MapsEngine_LayersListResponse
   */
  public function listLayers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_LayersListResponse");
  }
  /**
   * Mutate a layer asset. (layers.patch)
   *
   * @param string $id
   * The ID of the layer.
   * @param SmartSEO_Google_Layer $postBody
   * @param array $optParams Optional parameters.
   */
  public function patch($id, SmartSEO_Google_Service_MapsEngine_Layer $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params));
  }
  /**
   * Process a layer asset. (layers.process)
   *
   * @param string $id
   * The ID of the layer.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_ProcessResponse
   */
  public function process($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('process', array($params), "SmartSEO_Google_Service_MapsEngine_ProcessResponse");
  }
  /**
   * Publish a layer asset. (layers.publish)
   *
   * @param string $id
   * The ID of the layer.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_PublishResponse
   */
  public function publish($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('publish', array($params), "SmartSEO_Google_Service_MapsEngine_PublishResponse");
  }
  /**
   * Unpublish a layer asset. (layers.unpublish)
   *
   * @param string $id
   * The ID of the layer.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_PublishResponse
   */
  public function unpublish($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('unpublish', array($params), "SmartSEO_Google_Service_MapsEngine_PublishResponse");
  }
}

/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_LayersParents_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Return all parent ids of the specified layer. (parents.listLayersParents)
   *
   * @param string $id
   * The ID of the layer whose parents will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 50.
   * @return SmartSEO_Google_Service_MapsEngine_ParentsListResponse
   */
  public function listLayersParents($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_ParentsListResponse");
  }
}

/**
 * The "maps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $maps = $mapsengineService->maps;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_Maps_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Create a map asset. (maps.create)
   *
   * @param SmartSEO_Google_Map $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_Map
   */
  public function create(SmartSEO_Google_Service_MapsEngine_Map $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "SmartSEO_Google_Service_MapsEngine_Map");
  }
  /**
   * Delete a map. (maps.delete)
   *
   * @param string $id
   * The ID of the map. Only the map creator or project owner are permitted to delete. If the map is
    * published the request will fail. Unpublish the map prior to deleting.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Return metadata for a particular map. (maps.get)
   *
   * @param string $id
   * The ID of the map.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string version
   *
   * @return SmartSEO_Google_Service_MapsEngine_Map
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_MapsEngine_Map");
  }
  /**
   * Return all maps readable by the current user. (maps.listMaps)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string modifiedAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or after this time.
   * @opt_param string createdAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or after this time.
   * @opt_param string tags
   * A comma separated list of tags. Returned assets will contain all the tags from the list.
   * @opt_param string projectId
   * The ID of a Maps Engine project, used to filter the response. To list all available projects
    * with their IDs, send a Projects: list request. You can also find your project ID as the value of
    * the DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 100.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string creatorEmail
   * An email address representing a user. Returned assets that have been created by the user
    * associated with the provided email address.
   * @opt_param string bbox
   * A bounding box, expressed as "west,south,east,north". If set, only assets which intersect this
    * bounding box will be returned.
   * @opt_param string modifiedBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or before this time.
   * @opt_param string createdBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or before this time.
   * @return SmartSEO_Google_Service_MapsEngine_MapsListResponse
   */
  public function listMaps($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_MapsListResponse");
  }
  /**
   * Mutate a map asset. (maps.patch)
   *
   * @param string $id
   * The ID of the map.
   * @param SmartSEO_Google_Map $postBody
   * @param array $optParams Optional parameters.
   */
  public function patch($id, SmartSEO_Google_Service_MapsEngine_Map $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params));
  }
  /**
   * Publish a map asset. (maps.publish)
   *
   * @param string $id
   * The ID of the map.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_PublishResponse
   */
  public function publish($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('publish', array($params), "SmartSEO_Google_Service_MapsEngine_PublishResponse");
  }
  /**
   * Unpublish a map asset. (maps.unpublish)
   *
   * @param string $id
   * The ID of the map.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_PublishResponse
   */
  public function unpublish($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('unpublish', array($params), "SmartSEO_Google_Service_MapsEngine_PublishResponse");
  }
}

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $projects = $mapsengineService->projects;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_Projects_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Return all projects readable by the current user. (projects.listProjects)
   *
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_ProjectsListResponse
   */
  public function listProjects($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_ProjectsListResponse");
  }
}

/**
 * The "rasterCollections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $rasterCollections = $mapsengineService->rasterCollections;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_RasterCollections_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Cancel processing on a raster collection asset.
   * (rasterCollections.cancelProcessing)
   *
   * @param string $id
   * The ID of the raster collection.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_ProcessResponse
   */
  public function cancelProcessing($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('cancelProcessing', array($params), "SmartSEO_Google_Service_MapsEngine_ProcessResponse");
  }
  /**
   * Create a raster collection asset. (rasterCollections.create)
   *
   * @param SmartSEO_Google_RasterCollection $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_RasterCollection
   */
  public function create(SmartSEO_Google_Service_MapsEngine_RasterCollection $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "SmartSEO_Google_Service_MapsEngine_RasterCollection");
  }
  /**
   * Delete a raster collection. (rasterCollections.delete)
   *
   * @param string $id
   * The ID of the raster collection. Only the raster collection creator or project owner are
    * permitted to delete. If the rastor collection is included in a layer, the request will fail.
    * Remove the raster collection from all layers prior to deleting.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Return metadata for a particular raster collection. (rasterCollections.get)
   *
   * @param string $id
   * The ID of the raster collection.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_RasterCollection
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_MapsEngine_RasterCollection");
  }
  /**
   * Return all raster collections readable by the current user.
   * (rasterCollections.listRasterCollections)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string modifiedAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or after this time.
   * @opt_param string createdAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or after this time.
   * @opt_param string tags
   * A comma separated list of tags. Returned assets will contain all the tags from the list.
   * @opt_param string projectId
   * The ID of a Maps Engine project, used to filter the response. To list all available projects
    * with their IDs, send a Projects: list request. You can also find your project ID as the value of
    * the DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 100.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string creatorEmail
   * An email address representing a user. Returned assets that have been created by the user
    * associated with the provided email address.
   * @opt_param string bbox
   * A bounding box, expressed as "west,south,east,north". If set, only assets which intersect this
    * bounding box will be returned.
   * @opt_param string modifiedBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or before this time.
   * @opt_param string createdBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or before this time.
   * @return SmartSEO_Google_Service_MapsEngine_RasterCollectionsListResponse
   */
  public function listRasterCollections($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_RasterCollectionsListResponse");
  }
  /**
   * Mutate a raster collection asset. (rasterCollections.patch)
   *
   * @param string $id
   * The ID of the raster collection.
   * @param SmartSEO_Google_RasterCollection $postBody
   * @param array $optParams Optional parameters.
   */
  public function patch($id, SmartSEO_Google_Service_MapsEngine_RasterCollection $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params));
  }
  /**
   * Process a raster collection asset. (rasterCollections.process)
   *
   * @param string $id
   * The ID of the raster collection.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_ProcessResponse
   */
  public function process($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('process', array($params), "SmartSEO_Google_Service_MapsEngine_ProcessResponse");
  }
}

/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_RasterCollectionsParents_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Return all parent ids of the specified raster collection.
   * (parents.listRasterCollectionsParents)
   *
   * @param string $id
   * The ID of the raster collection whose parents will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 50.
   * @return SmartSEO_Google_Service_MapsEngine_ParentsListResponse
   */
  public function listRasterCollectionsParents($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_ParentsListResponse");
  }
}
/**
 * The "rasters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $rasters = $mapsengineService->rasters;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_RasterCollectionsRasters_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Remove rasters from an existing raster collection.
   *
   * Up to 50 rasters can be included in a single batchDelete request. Each
   * batchDelete request is atomic. (rasters.batchDelete)
   *
   * @param string $id
   * The ID of the raster collection to which these rasters belong.
   * @param SmartSEO_Google_RasterCollectionsRasterBatchDeleteRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_RasterCollectionsRastersBatchDeleteResponse
   */
  public function batchDelete($id, SmartSEO_Google_Service_MapsEngine_RasterCollectionsRasterBatchDeleteRequest $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params), "SmartSEO_Google_Service_MapsEngine_RasterCollectionsRastersBatchDeleteResponse");
  }
  /**
   * Add rasters to an existing raster collection. Rasters must be successfully
   * processed in order to be added to a raster collection.
   *
   * Up to 50 rasters can be included in a single batchInsert request. Each
   * batchInsert request is atomic. (rasters.batchInsert)
   *
   * @param string $id
   * The ID of the raster collection to which these rasters belong.
   * @param SmartSEO_Google_RasterCollectionsRastersBatchInsertRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_RasterCollectionsRastersBatchInsertResponse
   */
  public function batchInsert($id, SmartSEO_Google_Service_MapsEngine_RasterCollectionsRastersBatchInsertRequest $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchInsert', array($params), "SmartSEO_Google_Service_MapsEngine_RasterCollectionsRastersBatchInsertResponse");
  }
  /**
   * Return all rasters within a raster collection.
   * (rasters.listRasterCollectionsRasters)
   *
   * @param string $id
   * The ID of the raster collection to which these rasters belong.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string modifiedAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or after this time.
   * @opt_param string createdAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or after this time.
   * @opt_param string tags
   * A comma separated list of tags. Returned assets will contain all the tags from the list.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 100.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string creatorEmail
   * An email address representing a user. Returned assets that have been created by the user
    * associated with the provided email address.
   * @opt_param string bbox
   * A bounding box, expressed as "west,south,east,north". If set, only assets which intersect this
    * bounding box will be returned.
   * @opt_param string modifiedBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or before this time.
   * @opt_param string createdBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or before this time.
   * @return SmartSEO_Google_Service_MapsEngine_RasterCollectionsRastersListResponse
   */
  public function listRasterCollectionsRasters($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_RasterCollectionsRastersListResponse");
  }
}

/**
 * The "rasters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $rasters = $mapsengineService->rasters;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_Rasters_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Delete a raster. (rasters.delete)
   *
   * @param string $id
   * The ID of the raster. Only the raster creator or project owner are permitted to delete. If the
    * raster is included in a layer or mosaic, the request will fail. Remove it from all parents prior
    * to deleting.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Return metadata for a single raster. (rasters.get)
   *
   * @param string $id
   * The ID of the raster.
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_Raster
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_MapsEngine_Raster");
  }
  /**
   * Mutate a raster asset. (rasters.patch)
   *
   * @param string $id
   * The ID of the raster.
   * @param SmartSEO_Google_Raster $postBody
   * @param array $optParams Optional parameters.
   */
  public function patch($id, SmartSEO_Google_Service_MapsEngine_Raster $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params));
  }
  /**
   * Create a skeleton raster asset for upload. (rasters.upload)
   *
   * @param SmartSEO_Google_Raster $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_Raster
   */
  public function upload(SmartSEO_Google_Service_MapsEngine_Raster $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "SmartSEO_Google_Service_MapsEngine_Raster");
  }
}

/**
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $files = $mapsengineService->files;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_RastersFiles_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Upload a file to a raster asset. (files.insert)
   *
   * @param string $id
   * The ID of the raster asset.
   * @param string $filename
   * The file name of this uploaded file.
   * @param array $optParams Optional parameters.
   */
  public function insert($id, $filename, $optParams = array())
  {
    $params = array('id' => $id, 'filename' => $filename);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params));
  }
}
/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_RastersParents_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Return all parent ids of the specified rasters. (parents.listRastersParents)
   *
   * @param string $id
   * The ID of the rasters whose parents will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 50.
   * @return SmartSEO_Google_Service_MapsEngine_ParentsListResponse
   */
  public function listRastersParents($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_ParentsListResponse");
  }
}

/**
 * The "tables" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $tables = $mapsengineService->tables;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_Tables_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Create a table asset. (tables.create)
   *
   * @param SmartSEO_Google_Table $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_Table
   */
  public function create(SmartSEO_Google_Service_MapsEngine_Table $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "SmartSEO_Google_Service_MapsEngine_Table");
  }
  /**
   * Delete a table. (tables.delete)
   *
   * @param string $id
   * The ID of the table. Only the table creator or project owner are permitted to delete. If the
    * table is included in a layer, the request will fail. Remove it from all layers prior to
    * deleting.
   * @param array $optParams Optional parameters.
   */
  public function delete($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Return metadata for a particular table, including the schema. (tables.get)
   *
   * @param string $id
   * The ID of the table.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string version
   *
   * @return SmartSEO_Google_Service_MapsEngine_Table
   */
  public function get($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_MapsEngine_Table");
  }
  /**
   * Return all tables readable by the current user. (tables.listTables)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string modifiedAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or after this time.
   * @opt_param string createdAfter
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or after this time.
   * @opt_param string tags
   * A comma separated list of tags. Returned assets will contain all the tags from the list.
   * @opt_param string projectId
   * The ID of a Maps Engine project, used to filter the response. To list all available projects
    * with their IDs, send a Projects: list request. You can also find your project ID as the value of
    * the DashboardPlace:cid URL parameter when signed in to mapsengine.google.com.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 100.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string creatorEmail
   * An email address representing a user. Returned assets that have been created by the user
    * associated with the provided email address.
   * @opt_param string bbox
   * A bounding box, expressed as "west,south,east,north". If set, only assets which intersect this
    * bounding box will be returned.
   * @opt_param string modifiedBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been modified at or before this time.
   * @opt_param string createdBefore
   * An RFC 3339 formatted date-time value (e.g. 1970-01-01T00:00:00Z). Returned assets will have
    * been created at or before this time.
   * @return SmartSEO_Google_Service_MapsEngine_TablesListResponse
   */
  public function listTables($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_TablesListResponse");
  }
  /**
   * Mutate a table asset. (tables.patch)
   *
   * @param string $id
   * The ID of the table.
   * @param SmartSEO_Google_Table $postBody
   * @param array $optParams Optional parameters.
   */
  public function patch($id, SmartSEO_Google_Service_MapsEngine_Table $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params));
  }
  /**
   * Create a placeholder table asset to which table files can be uploaded. Once
   * the placeholder has been created, files are uploaded to the
   * https://www.googleapis.com/upload/mapsengine/v1/tables/table_id/files
   * endpoint. See Table Upload in the Developer's Guide or Table.files: insert in
   * the reference documentation for more information. (tables.upload)
   *
   * @param SmartSEO_Google_Table $postBody
   * @param array $optParams Optional parameters.
   * @return SmartSEO_Google_Service_MapsEngine_Table
   */
  public function upload(SmartSEO_Google_Service_MapsEngine_Table $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "SmartSEO_Google_Service_MapsEngine_Table");
  }
}

/**
 * The "features" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $features = $mapsengineService->features;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_TablesFeatures_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Delete all features matching the given IDs. (features.batchDelete)
   *
   * @param string $id
   * The ID of the table that contains the features to be deleted.
   * @param SmartSEO_Google_FeaturesBatchDeleteRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function batchDelete($id, SmartSEO_Google_Service_MapsEngine_FeaturesBatchDeleteRequest $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchDelete', array($params));
  }
  /**
   * Append features to an existing table.
   *
   * A single batchInsert request can create:
   *
   * - Up to 50 features. - A combined total of 10 000 vertices. Feature limits
   * are documented in the Supported data formats and limits article of the Google
   * Maps Engine help center. Note that free and paid accounts have different
   * limits.
   *
   * For more information about inserting features, read Creating features in the
   * Google Maps Engine developer's guide. (features.batchInsert)
   *
   * @param string $id
   * The ID of the table to append the features to.
   * @param SmartSEO_Google_FeaturesBatchInsertRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function batchInsert($id, SmartSEO_Google_Service_MapsEngine_FeaturesBatchInsertRequest $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchInsert', array($params));
  }
  /**
   * Update the supplied features.
   *
   * A single batchPatch request can update:
   *
   * - Up to 50 features. - A combined total of 10 000 vertices. Feature limits
   * are documented in the Supported data formats and limits article of the Google
   * Maps Engine help center. Note that free and paid accounts have different
   * limits.
   *
   * Feature updates use HTTP PATCH semantics:
   *
   * - A supplied value replaces an existing value (if any) in that field. -
   * Omitted fields remain unchanged. - Complex values in geometries and
   * properties must be replaced as atomic units. For example, providing just the
   * coordinates of a geometry is not allowed; the complete geometry, including
   * type, must be supplied. - Setting a property's value to null deletes that
   * property. For more information about updating features, read Updating
   * features in the Google Maps Engine developer's guide. (features.batchPatch)
   *
   * @param string $id
   * The ID of the table containing the features to be patched.
   * @param SmartSEO_Google_FeaturesBatchPatchRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function batchPatch($id, SmartSEO_Google_Service_MapsEngine_FeaturesBatchPatchRequest $postBody, $optParams = array())
  {
    $params = array('id' => $id, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('batchPatch', array($params));
  }
  /**
   * Return a single feature, given its ID. (features.get)
   *
   * @param string $tableId
   * The ID of the table.
   * @param string $id
   * The ID of the feature to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string version
   * The table version to access. See Accessing Public Data for information.
   * @opt_param string select
   * A SQL-like projection clause used to specify returned properties. If this parameter is not
    * included, all properties are returned.
   * @return SmartSEO_Google_Service_MapsEngine_Feature
   */
  public function get($tableId, $id, $optParams = array())
  {
    $params = array('tableId' => $tableId, 'id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "SmartSEO_Google_Service_MapsEngine_Feature");
  }
  /**
   * Return all features readable by the current user.
   * (features.listTablesFeatures)
   *
   * @param string $id
   * The ID of the table to which these features belong.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy
   * An SQL-like order by clause used to sort results. If this parameter is not included, the order
    * of features is undefined.
   * @opt_param string intersects
   * A geometry literal that specifies the spatial restriction of the query.
   * @opt_param string maxResults
   * The maximum number of items to include in the response, used for paging. The maximum supported
    * value is 1000.
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string version
   * The table version to access. See Accessing Public Data for information.
   * @opt_param string limit
   * The total number of features to return from the query, irrespective of the number of pages.
   * @opt_param string include
   * A comma separated list of optional data to include. Optional data available: schema.
   * @opt_param string where
   * An SQL-like predicate used to filter results.
   * @opt_param string select
   * A SQL-like projection clause used to specify returned properties. If this parameter is not
    * included, all properties are returned.
   * @return SmartSEO_Google_Service_MapsEngine_FeaturesListResponse
   */
  public function listTablesFeatures($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_FeaturesListResponse");
  }
}
/**
 * The "files" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $files = $mapsengineService->files;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_TablesFiles_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Upload a file to a placeholder table asset. See Table Upload in the
   * Developer's Guide for more information. Supported file types are listed in
   * the Supported data formats and limits article of the Google Maps Engine help
   * center. (files.insert)
   *
   * @param string $id
   * The ID of the table asset.
   * @param string $filename
   * The file name of this uploaded file.
   * @param array $optParams Optional parameters.
   */
  public function insert($id, $filename, $optParams = array())
  {
    $params = array('id' => $id, 'filename' => $filename);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params));
  }
}
/**
 * The "parents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mapsengineService = new SmartSEO_Google_Service_MapsEngine(...);
 *   $parents = $mapsengineService->parents;
 *  </code>
 */
class SmartSEO_Google_Service_MapsEngine_TablesParents_Resource extends SmartSEO_Google_Service_Resource
{

  /**
   * Return all parent ids of the specified table. (parents.listTablesParents)
   *
   * @param string $id
   * The ID of the table whose parents will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken
   * The continuation token, used to page through large result sets. To get the next page of results,
    * set this parameter to the value of nextPageToken from the previous response.
   * @opt_param string maxResults
   * The maximum number of items to include in a single response page. The maximum supported value is
    * 50.
   * @return SmartSEO_Google_Service_MapsEngine_ParentsListResponse
   */
  public function listTablesParents($id, $optParams = array())
  {
    $params = array('id' => $id);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "SmartSEO_Google_Service_MapsEngine_ParentsListResponse");
  }
}




class SmartSEO_Google_Service_MapsEngine_AcquisitionTime extends SmartSEO_Google_Model
{
  public $end;
  public $precision;
  public $start;

  public function setEnd($end)
  {
    $this->end = $end;
  }

  public function getEnd()
  {
    return $this->end;
  }

  public function setPrecision($precision)
  {
    $this->precision = $precision;
  }

  public function getPrecision()
  {
    return $this->precision;
  }

  public function setStart($start)
  {
    $this->start = $start;
  }

  public function getStart()
  {
    return $this->start;
  }
}

class SmartSEO_Google_Service_MapsEngine_Asset extends SmartSEO_Google_Collection
{
  public $bbox;
  public $creationTime;
  public $description;
  public $etag;
  public $id;
  public $lastModifiedTime;
  public $name;
  public $projectId;
  public $resource;
  public $tags;
  public $type;

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setResource($resource)
  {
    $this->resource = $resource;
  }

  public function getResource()
  {
    return $this->resource;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
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

class SmartSEO_Google_Service_MapsEngine_AssetsListResponse extends SmartSEO_Google_Collection
{
  protected $assetsType = 'SmartSEO_Google_Service_MapsEngine_Asset';
  protected $assetsDataType = 'array';
  public $nextPageToken;

  public function setAssets($assets)
  {
    $this->assets = $assets;
  }

  public function getAssets()
  {
    return $this->assets;
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

class SmartSEO_Google_Service_MapsEngine_Border extends SmartSEO_Google_Model
{
  public $color;
  public $opacity;
  public $width;

  public function setColor($color)
  {
    $this->color = $color;
  }

  public function getColor()
  {
    return $this->color;
  }

  public function setOpacity($opacity)
  {
    $this->opacity = $opacity;
  }

  public function getOpacity()
  {
    return $this->opacity;
  }

  public function setWidth($width)
  {
    $this->width = $width;
  }

  public function getWidth()
  {
    return $this->width;
  }
}

class SmartSEO_Google_Service_MapsEngine_Color extends SmartSEO_Google_Model
{
  public $color;
  public $opacity;

  public function setColor($color)
  {
    $this->color = $color;
  }

  public function getColor()
  {
    return $this->color;
  }

  public function setOpacity($opacity)
  {
    $this->opacity = $opacity;
  }

  public function getOpacity()
  {
    return $this->opacity;
  }
}

class SmartSEO_Google_Service_MapsEngine_Datasource extends SmartSEO_Google_Model
{
  public $id;

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }
}

class SmartSEO_Google_Service_MapsEngine_DisplayRule extends SmartSEO_Google_Collection
{
  protected $filtersType = 'SmartSEO_Google_Service_MapsEngine_Filter';
  protected $filtersDataType = 'array';
  protected $lineOptionsType = 'SmartSEO_Google_Service_MapsEngine_LineStyle';
  protected $lineOptionsDataType = '';
  public $name;
  protected $pointOptionsType = 'SmartSEO_Google_Service_MapsEngine_PointStyle';
  protected $pointOptionsDataType = '';
  protected $polygonOptionsType = 'SmartSEO_Google_Service_MapsEngine_PolygonStyle';
  protected $polygonOptionsDataType = '';
  protected $zoomLevelsType = 'SmartSEO_Google_Service_MapsEngine_ZoomLevels';
  protected $zoomLevelsDataType = '';

  public function setFilters($filters)
  {
    $this->filters = $filters;
  }

  public function getFilters()
  {
    return $this->filters;
  }

  public function setLineOptions(SmartSEO_Google_Service_MapsEngine_LineStyle $lineOptions)
  {
    $this->lineOptions = $lineOptions;
  }

  public function getLineOptions()
  {
    return $this->lineOptions;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setPointOptions(SmartSEO_Google_Service_MapsEngine_PointStyle $pointOptions)
  {
    $this->pointOptions = $pointOptions;
  }

  public function getPointOptions()
  {
    return $this->pointOptions;
  }

  public function setPolygonOptions(SmartSEO_Google_Service_MapsEngine_PolygonStyle $polygonOptions)
  {
    $this->polygonOptions = $polygonOptions;
  }

  public function getPolygonOptions()
  {
    return $this->polygonOptions;
  }

  public function setZoomLevels(SmartSEO_Google_Service_MapsEngine_ZoomLevels $zoomLevels)
  {
    $this->zoomLevels = $zoomLevels;
  }

  public function getZoomLevels()
  {
    return $this->zoomLevels;
  }
}

class SmartSEO_Google_Service_MapsEngine_Feature extends SmartSEO_Google_Model
{
  protected $geometryType = 'SmartSEO_Google_Service_MapsEngine_GeoJsonGeometry';
  protected $geometryDataType = '';
  public $properties;
  public $type;

  public function setGeometry(SmartSEO_Google_Service_MapsEngine_GeoJsonGeometry $geometry)
  {
    $this->geometry = $geometry;
  }

  public function getGeometry()
  {
    return $this->geometry;
  }

  public function setProperties($properties)
  {
    $this->properties = $properties;
  }

  public function getProperties()
  {
    return $this->properties;
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

class SmartSEO_Google_Service_MapsEngine_FeatureInfo extends SmartSEO_Google_Model
{
  public $content;

  public function setContent($content)
  {
    $this->content = $content;
  }

  public function getContent()
  {
    return $this->content;
  }
}

class SmartSEO_Google_Service_MapsEngine_FeaturesBatchDeleteRequest extends SmartSEO_Google_Collection
{
  public $gxIds;
  public $primaryKeys;

  public function setGxIds($gxIds)
  {
    $this->gxIds = $gxIds;
  }

  public function getGxIds()
  {
    return $this->gxIds;
  }

  public function setPrimaryKeys($primaryKeys)
  {
    $this->primaryKeys = $primaryKeys;
  }

  public function getPrimaryKeys()
  {
    return $this->primaryKeys;
  }
}

class SmartSEO_Google_Service_MapsEngine_FeaturesBatchInsertRequest extends SmartSEO_Google_Collection
{
  protected $featuresType = 'SmartSEO_Google_Service_MapsEngine_Feature';
  protected $featuresDataType = 'array';

  public function setFeatures($features)
  {
    $this->features = $features;
  }

  public function getFeatures()
  {
    return $this->features;
  }
}

class SmartSEO_Google_Service_MapsEngine_FeaturesBatchPatchRequest extends SmartSEO_Google_Collection
{
  protected $featuresType = 'SmartSEO_Google_Service_MapsEngine_Feature';
  protected $featuresDataType = 'array';

  public function setFeatures($features)
  {
    $this->features = $features;
  }

  public function getFeatures()
  {
    return $this->features;
  }
}

class SmartSEO_Google_Service_MapsEngine_FeaturesListResponse extends SmartSEO_Google_Collection
{
  public $allowedQueriesPerSecond;
  protected $featuresType = 'SmartSEO_Google_Service_MapsEngine_Feature';
  protected $featuresDataType = 'array';
  public $nextPageToken;
  protected $schemaType = 'SmartSEO_Google_Service_MapsEngine_Schema';
  protected $schemaDataType = '';
  public $type;

  public function setAllowedQueriesPerSecond($allowedQueriesPerSecond)
  {
    $this->allowedQueriesPerSecond = $allowedQueriesPerSecond;
  }

  public function getAllowedQueriesPerSecond()
  {
    return $this->allowedQueriesPerSecond;
  }

  public function setFeatures($features)
  {
    $this->features = $features;
  }

  public function getFeatures()
  {
    return $this->features;
  }

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setSchema(SmartSEO_Google_Service_MapsEngine_Schema $schema)
  {
    $this->schema = $schema;
  }

  public function getSchema()
  {
    return $this->schema;
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

class SmartSEO_Google_Service_MapsEngine_Filter extends SmartSEO_Google_Model
{
  public $column;
  public $operator;
  public $value;

  public function setColumn($column)
  {
    $this->column = $column;
  }

  public function getColumn()
  {
    return $this->column;
  }

  public function setOperator($operator)
  {
    $this->operator = $operator;
  }

  public function getOperator()
  {
    return $this->operator;
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

class SmartSEO_Google_Service_MapsEngine_GeoJsonGeometry extends SmartSEO_Google_Model
{
  public $type;

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getType()
  {
    return $this->type;
  }
}

class SmartSEO_Google_Service_MapsEngine_GeoJsonGeometryCollection extends SmartSEO_Google_Collection
{
  protected $geometriesType = 'SmartSEO_Google_Service_MapsEngine_GeoJsonGeometry';
  protected $geometriesDataType = 'array';

  public function setGeometries($geometries)
  {
    $this->geometries = $geometries;
  }

  public function getGeometries()
  {
    return $this->geometries;
  }
}

class SmartSEO_Google_Service_MapsEngine_GeoJsonLineString extends SmartSEO_Google_Collection
{
  public $coordinates;

  public function setCoordinates($coordinates)
  {
    $this->coordinates = $coordinates;
  }

  public function getCoordinates()
  {
    return $this->coordinates;
  }
}

class SmartSEO_Google_Service_MapsEngine_GeoJsonMultiLineString extends SmartSEO_Google_Collection
{
  public $coordinates;

  public function setCoordinates($coordinates)
  {
    $this->coordinates = $coordinates;
  }

  public function getCoordinates()
  {
    return $this->coordinates;
  }
}

class SmartSEO_Google_Service_MapsEngine_GeoJsonMultiPoint extends SmartSEO_Google_Collection
{
  public $coordinates;

  public function setCoordinates($coordinates)
  {
    $this->coordinates = $coordinates;
  }

  public function getCoordinates()
  {
    return $this->coordinates;
  }
}

class SmartSEO_Google_Service_MapsEngine_GeoJsonMultiPolygon extends SmartSEO_Google_Collection
{
  public $coordinates;

  public function setCoordinates($coordinates)
  {
    $this->coordinates = $coordinates;
  }

  public function getCoordinates()
  {
    return $this->coordinates;
  }
}

class SmartSEO_Google_Service_MapsEngine_GeoJsonPoint extends SmartSEO_Google_Collection
{
  public $coordinates;

  public function setCoordinates($coordinates)
  {
    $this->coordinates = $coordinates;
  }

  public function getCoordinates()
  {
    return $this->coordinates;
  }
}

class SmartSEO_Google_Service_MapsEngine_GeoJsonPolygon extends SmartSEO_Google_Collection
{
  public $coordinates;

  public function setCoordinates($coordinates)
  {
    $this->coordinates = $coordinates;
  }

  public function getCoordinates()
  {
    return $this->coordinates;
  }
}

class SmartSEO_Google_Service_MapsEngine_GeoJsonProperties extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_MapsEngine_IconStyle extends SmartSEO_Google_Model
{
  public $id;
  public $name;

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
}

class SmartSEO_Google_Service_MapsEngine_LabelStyle extends SmartSEO_Google_Model
{
  public $color;
  public $column;
  public $fontStyle;
  public $fontWeight;
  public $opacity;
  protected $outlineType = 'SmartSEO_Google_Service_MapsEngine_Color';
  protected $outlineDataType = '';
  public $size;

  public function setColor($color)
  {
    $this->color = $color;
  }

  public function getColor()
  {
    return $this->color;
  }

  public function setColumn($column)
  {
    $this->column = $column;
  }

  public function getColumn()
  {
    return $this->column;
  }

  public function setFontStyle($fontStyle)
  {
    $this->fontStyle = $fontStyle;
  }

  public function getFontStyle()
  {
    return $this->fontStyle;
  }

  public function setFontWeight($fontWeight)
  {
    $this->fontWeight = $fontWeight;
  }

  public function getFontWeight()
  {
    return $this->fontWeight;
  }

  public function setOpacity($opacity)
  {
    $this->opacity = $opacity;
  }

  public function getOpacity()
  {
    return $this->opacity;
  }

  public function setOutline(SmartSEO_Google_Service_MapsEngine_Color $outline)
  {
    $this->outline = $outline;
  }

  public function getOutline()
  {
    return $this->outline;
  }

  public function setSize($size)
  {
    $this->size = $size;
  }

  public function getSize()
  {
    return $this->size;
  }
}

class SmartSEO_Google_Service_MapsEngine_Layer extends SmartSEO_Google_Collection
{
  public $bbox;
  public $creationTime;
  public $datasourceType;
  protected $datasourcesType = 'SmartSEO_Google_Service_MapsEngine_Datasource';
  protected $datasourcesDataType = 'array';
  public $description;
  public $draftAccessList;
  public $etag;
  public $id;
  public $lastModifiedTime;
  public $name;
  public $processingStatus;
  public $projectId;
  public $publishedAccessList;
  protected $styleType = 'SmartSEO_Google_Service_MapsEngine_VectorStyle';
  protected $styleDataType = '';
  public $tags;

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
  }

  public function setDatasourceType($datasourceType)
  {
    $this->datasourceType = $datasourceType;
  }

  public function getDatasourceType()
  {
    return $this->datasourceType;
  }

  public function setDatasources(SmartSEO_Google_Service_MapsEngine_Datasource $datasources)
  {
    $this->datasources = $datasources;
  }

  public function getDatasources()
  {
    return $this->datasources;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDraftAccessList($draftAccessList)
  {
    $this->draftAccessList = $draftAccessList;
  }

  public function getDraftAccessList()
  {
    return $this->draftAccessList;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setProcessingStatus($processingStatus)
  {
    $this->processingStatus = $processingStatus;
  }

  public function getProcessingStatus()
  {
    return $this->processingStatus;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setPublishedAccessList($publishedAccessList)
  {
    $this->publishedAccessList = $publishedAccessList;
  }

  public function getPublishedAccessList()
  {
    return $this->publishedAccessList;
  }

  public function setStyle(SmartSEO_Google_Service_MapsEngine_VectorStyle $style)
  {
    $this->style = $style;
  }

  public function getStyle()
  {
    return $this->style;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }
}

class SmartSEO_Google_Service_MapsEngine_LayersListResponse extends SmartSEO_Google_Collection
{
  protected $layersType = 'SmartSEO_Google_Service_MapsEngine_Layer';
  protected $layersDataType = 'array';
  public $nextPageToken;

  public function setLayers($layers)
  {
    $this->layers = $layers;
  }

  public function getLayers()
  {
    return $this->layers;
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

class SmartSEO_Google_Service_MapsEngine_LineStyle extends SmartSEO_Google_Collection
{
  protected $borderType = 'SmartSEO_Google_Service_MapsEngine_Border';
  protected $borderDataType = '';
  public $dash;
  protected $labelType = 'SmartSEO_Google_Service_MapsEngine_LabelStyle';
  protected $labelDataType = '';
  protected $strokeType = 'SmartSEO_Google_Service_MapsEngine_LineStyleStroke';
  protected $strokeDataType = '';

  public function setBorder(SmartSEO_Google_Service_MapsEngine_Border $border)
  {
    $this->border = $border;
  }

  public function getBorder()
  {
    return $this->border;
  }

  public function setDash($dash)
  {
    $this->dash = $dash;
  }

  public function getDash()
  {
    return $this->dash;
  }

  public function setLabel(SmartSEO_Google_Service_MapsEngine_LabelStyle $label)
  {
    $this->label = $label;
  }

  public function getLabel()
  {
    return $this->label;
  }

  public function setStroke(SmartSEO_Google_Service_MapsEngine_LineStyleStroke $stroke)
  {
    $this->stroke = $stroke;
  }

  public function getStroke()
  {
    return $this->stroke;
  }
}

class SmartSEO_Google_Service_MapsEngine_LineStyleStroke extends SmartSEO_Google_Model
{
  public $color;
  public $opacity;
  public $width;

  public function setColor($color)
  {
    $this->color = $color;
  }

  public function getColor()
  {
    return $this->color;
  }

  public function setOpacity($opacity)
  {
    $this->opacity = $opacity;
  }

  public function getOpacity()
  {
    return $this->opacity;
  }

  public function setWidth($width)
  {
    $this->width = $width;
  }

  public function getWidth()
  {
    return $this->width;
  }
}

class SmartSEO_Google_Service_MapsEngine_Map extends SmartSEO_Google_Collection
{
  public $bbox;
  protected $contentsType = 'SmartSEO_Google_Service_MapsEngine_MapItem';
  protected $contentsDataType = '';
  public $creationTime;
  public $defaultViewport;
  public $description;
  public $draftAccessList;
  public $etag;
  public $id;
  public $lastModifiedTime;
  public $name;
  public $processingStatus;
  public $projectId;
  public $publishedAccessList;
  public $tags;
  public $versions;

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

  public function setContents(SmartSEO_Google_Service_MapsEngine_MapItem $contents)
  {
    $this->contents = $contents;
  }

  public function getContents()
  {
    return $this->contents;
  }

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
  }

  public function setDefaultViewport($defaultViewport)
  {
    $this->defaultViewport = $defaultViewport;
  }

  public function getDefaultViewport()
  {
    return $this->defaultViewport;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDraftAccessList($draftAccessList)
  {
    $this->draftAccessList = $draftAccessList;
  }

  public function getDraftAccessList()
  {
    return $this->draftAccessList;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setProcessingStatus($processingStatus)
  {
    $this->processingStatus = $processingStatus;
  }

  public function getProcessingStatus()
  {
    return $this->processingStatus;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setPublishedAccessList($publishedAccessList)
  {
    $this->publishedAccessList = $publishedAccessList;
  }

  public function getPublishedAccessList()
  {
    return $this->publishedAccessList;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }

  public function setVersions($versions)
  {
    $this->versions = $versions;
  }

  public function getVersions()
  {
    return $this->versions;
  }
}

class SmartSEO_Google_Service_MapsEngine_MapFolder extends SmartSEO_Google_Collection
{
  protected $contentsType = 'SmartSEO_Google_Service_MapsEngine_MapItem';
  protected $contentsDataType = 'array';
  public $defaultViewport;
  public $expandable;
  public $key;
  public $name;
  public $visibility;

  public function setContents($contents)
  {
    $this->contents = $contents;
  }

  public function getContents()
  {
    return $this->contents;
  }

  public function setDefaultViewport($defaultViewport)
  {
    $this->defaultViewport = $defaultViewport;
  }

  public function getDefaultViewport()
  {
    return $this->defaultViewport;
  }

  public function setExpandable($expandable)
  {
    $this->expandable = $expandable;
  }

  public function getExpandable()
  {
    return $this->expandable;
  }

  public function setKey($key)
  {
    $this->key = $key;
  }

  public function getKey()
  {
    return $this->key;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }

  public function getVisibility()
  {
    return $this->visibility;
  }
}

class SmartSEO_Google_Service_MapsEngine_MapItem extends SmartSEO_Google_Model
{
  public $type;

  public function setType($type)
  {
    $this->type = $type;
  }

  public function getType()
  {
    return $this->type;
  }
}

class SmartSEO_Google_Service_MapsEngine_MapKmlLink extends SmartSEO_Google_Collection
{
  public $defaultViewport;
  public $kmlUrl;
  public $name;
  public $visibility;

  public function setDefaultViewport($defaultViewport)
  {
    $this->defaultViewport = $defaultViewport;
  }

  public function getDefaultViewport()
  {
    return $this->defaultViewport;
  }

  public function setKmlUrl($kmlUrl)
  {
    $this->kmlUrl = $kmlUrl;
  }

  public function getKmlUrl()
  {
    return $this->kmlUrl;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }

  public function getVisibility()
  {
    return $this->visibility;
  }
}

class SmartSEO_Google_Service_MapsEngine_MapLayer extends SmartSEO_Google_Collection
{
  public $defaultViewport;
  public $id;
  public $key;
  public $name;
  public $visibility;

  public function setDefaultViewport($defaultViewport)
  {
    $this->defaultViewport = $defaultViewport;
  }

  public function getDefaultViewport()
  {
    return $this->defaultViewport;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setKey($key)
  {
    $this->key = $key;
  }

  public function getKey()
  {
    return $this->key;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }

  public function getVisibility()
  {
    return $this->visibility;
  }
}

class SmartSEO_Google_Service_MapsEngine_MapsListResponse extends SmartSEO_Google_Collection
{
  protected $mapsType = 'SmartSEO_Google_Service_MapsEngine_Map';
  protected $mapsDataType = 'array';
  public $nextPageToken;

  public function setMaps($maps)
  {
    $this->maps = $maps;
  }

  public function getMaps()
  {
    return $this->maps;
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

class SmartSEO_Google_Service_MapsEngine_MapsengineFile extends SmartSEO_Google_Model
{
  public $filename;
  public $size;
  public $uploadStatus;

  public function setFilename($filename)
  {
    $this->filename = $filename;
  }

  public function getFilename()
  {
    return $this->filename;
  }

  public function setSize($size)
  {
    $this->size = $size;
  }

  public function getSize()
  {
    return $this->size;
  }

  public function setUploadStatus($uploadStatus)
  {
    $this->uploadStatus = $uploadStatus;
  }

  public function getUploadStatus()
  {
    return $this->uploadStatus;
  }
}

class SmartSEO_Google_Service_MapsEngine_Parent extends SmartSEO_Google_Model
{
  public $id;

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }
}

class SmartSEO_Google_Service_MapsEngine_ParentsListResponse extends SmartSEO_Google_Collection
{
  public $nextPageToken;
  protected $parentsType = 'SmartSEO_Google_Service_MapsEngine_Parent';
  protected $parentsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setParents($parents)
  {
    $this->parents = $parents;
  }

  public function getParents()
  {
    return $this->parents;
  }
}

class SmartSEO_Google_Service_MapsEngine_PointStyle extends SmartSEO_Google_Model
{
  protected $iconType = 'SmartSEO_Google_Service_MapsEngine_IconStyle';
  protected $iconDataType = '';
  protected $labelType = 'SmartSEO_Google_Service_MapsEngine_LabelStyle';
  protected $labelDataType = '';

  public function setIcon(SmartSEO_Google_Service_MapsEngine_IconStyle $icon)
  {
    $this->icon = $icon;
  }

  public function getIcon()
  {
    return $this->icon;
  }

  public function setLabel(SmartSEO_Google_Service_MapsEngine_LabelStyle $label)
  {
    $this->label = $label;
  }

  public function getLabel()
  {
    return $this->label;
  }
}

class SmartSEO_Google_Service_MapsEngine_PolygonStyle extends SmartSEO_Google_Model
{
  protected $fillType = 'SmartSEO_Google_Service_MapsEngine_Color';
  protected $fillDataType = '';
  protected $strokeType = 'SmartSEO_Google_Service_MapsEngine_Border';
  protected $strokeDataType = '';

  public function setFill(SmartSEO_Google_Service_MapsEngine_Color $fill)
  {
    $this->fill = $fill;
  }

  public function getFill()
  {
    return $this->fill;
  }

  public function setStroke(SmartSEO_Google_Service_MapsEngine_Border $stroke)
  {
    $this->stroke = $stroke;
  }

  public function getStroke()
  {
    return $this->stroke;
  }
}

class SmartSEO_Google_Service_MapsEngine_ProcessResponse extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_MapsEngine_Project extends SmartSEO_Google_Model
{
  public $id;
  public $name;

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
}

class SmartSEO_Google_Service_MapsEngine_ProjectsListResponse extends SmartSEO_Google_Collection
{
  protected $projectsType = 'SmartSEO_Google_Service_MapsEngine_Project';
  protected $projectsDataType = 'array';

  public function setProjects($projects)
  {
    $this->projects = $projects;
  }

  public function getProjects()
  {
    return $this->projects;
  }
}

class SmartSEO_Google_Service_MapsEngine_PublishResponse extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_MapsEngine_Raster extends SmartSEO_Google_Collection
{
  protected $acquisitionTimeType = 'SmartSEO_Google_Service_MapsEngine_AcquisitionTime';
  protected $acquisitionTimeDataType = '';
  public $attribution;
  public $bbox;
  public $creationTime;
  public $description;
  public $draftAccessList;
  public $etag;
  protected $filesType = 'SmartSEO_Google_Service_MapsEngine_MapsengineFile';
  protected $filesDataType = 'array';
  public $id;
  public $lastModifiedTime;
  public $maskType;
  public $name;
  public $processingStatus;
  public $projectId;
  public $rasterType;
  public $tags;

  public function setAcquisitionTime(SmartSEO_Google_Service_MapsEngine_AcquisitionTime $acquisitionTime)
  {
    $this->acquisitionTime = $acquisitionTime;
  }

  public function getAcquisitionTime()
  {
    return $this->acquisitionTime;
  }

  public function setAttribution($attribution)
  {
    $this->attribution = $attribution;
  }

  public function getAttribution()
  {
    return $this->attribution;
  }

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDraftAccessList($draftAccessList)
  {
    $this->draftAccessList = $draftAccessList;
  }

  public function getDraftAccessList()
  {
    return $this->draftAccessList;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setFiles($files)
  {
    $this->files = $files;
  }

  public function getFiles()
  {
    return $this->files;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }

  public function setMaskType($maskType)
  {
    $this->maskType = $maskType;
  }

  public function getMaskType()
  {
    return $this->maskType;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setProcessingStatus($processingStatus)
  {
    $this->processingStatus = $processingStatus;
  }

  public function getProcessingStatus()
  {
    return $this->processingStatus;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setRasterType($rasterType)
  {
    $this->rasterType = $rasterType;
  }

  public function getRasterType()
  {
    return $this->rasterType;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }
}

class SmartSEO_Google_Service_MapsEngine_RasterCollection extends SmartSEO_Google_Collection
{
  public $attribution;
  public $bbox;
  public $creationTime;
  public $description;
  public $draftAccessList;
  public $etag;
  public $id;
  public $lastModifiedTime;
  public $mosaic;
  public $name;
  public $processingStatus;
  public $projectId;
  public $rasterType;
  public $tags;

  public function setAttribution($attribution)
  {
    $this->attribution = $attribution;
  }

  public function getAttribution()
  {
    return $this->attribution;
  }

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDraftAccessList($draftAccessList)
  {
    $this->draftAccessList = $draftAccessList;
  }

  public function getDraftAccessList()
  {
    return $this->draftAccessList;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }

  public function setMosaic($mosaic)
  {
    $this->mosaic = $mosaic;
  }

  public function getMosaic()
  {
    return $this->mosaic;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setProcessingStatus($processingStatus)
  {
    $this->processingStatus = $processingStatus;
  }

  public function getProcessingStatus()
  {
    return $this->processingStatus;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setRasterType($rasterType)
  {
    $this->rasterType = $rasterType;
  }

  public function getRasterType()
  {
    return $this->rasterType;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }
}

class SmartSEO_Google_Service_MapsEngine_RasterCollectionsListResponse extends SmartSEO_Google_Collection
{
  public $nextPageToken;
  protected $rasterCollectionsType = 'SmartSEO_Google_Service_MapsEngine_RasterCollection';
  protected $rasterCollectionsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setRasterCollections($rasterCollections)
  {
    $this->rasterCollections = $rasterCollections;
  }

  public function getRasterCollections()
  {
    return $this->rasterCollections;
  }
}

class SmartSEO_Google_Service_MapsEngine_RasterCollectionsRaster extends SmartSEO_Google_Collection
{
  public $bbox;
  public $creationTime;
  public $description;
  public $id;
  public $lastModifiedTime;
  public $name;
  public $projectId;
  public $rasterType;
  public $tags;

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
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

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setRasterType($rasterType)
  {
    $this->rasterType = $rasterType;
  }

  public function getRasterType()
  {
    return $this->rasterType;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }
}

class SmartSEO_Google_Service_MapsEngine_RasterCollectionsRasterBatchDeleteRequest extends SmartSEO_Google_Collection
{
  public $ids;

  public function setIds($ids)
  {
    $this->ids = $ids;
  }

  public function getIds()
  {
    return $this->ids;
  }
}

class SmartSEO_Google_Service_MapsEngine_RasterCollectionsRastersBatchDeleteResponse extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_MapsEngine_RasterCollectionsRastersBatchInsertRequest extends SmartSEO_Google_Collection
{
  public $ids;

  public function setIds($ids)
  {
    $this->ids = $ids;
  }

  public function getIds()
  {
    return $this->ids;
  }
}

class SmartSEO_Google_Service_MapsEngine_RasterCollectionsRastersBatchInsertResponse extends SmartSEO_Google_Model
{

}

class SmartSEO_Google_Service_MapsEngine_RasterCollectionsRastersListResponse extends SmartSEO_Google_Collection
{
  public $nextPageToken;
  protected $rastersType = 'SmartSEO_Google_Service_MapsEngine_RasterCollectionsRaster';
  protected $rastersDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setRasters($rasters)
  {
    $this->rasters = $rasters;
  }

  public function getRasters()
  {
    return $this->rasters;
  }
}

class SmartSEO_Google_Service_MapsEngine_Schema extends SmartSEO_Google_Collection
{
  protected $columnsType = 'SmartSEO_Google_Service_MapsEngine_TableColumn';
  protected $columnsDataType = 'array';
  public $primaryGeometry;
  public $primaryKey;

  public function setColumns($columns)
  {
    $this->columns = $columns;
  }

  public function getColumns()
  {
    return $this->columns;
  }

  public function setPrimaryGeometry($primaryGeometry)
  {
    $this->primaryGeometry = $primaryGeometry;
  }

  public function getPrimaryGeometry()
  {
    return $this->primaryGeometry;
  }

  public function setPrimaryKey($primaryKey)
  {
    $this->primaryKey = $primaryKey;
  }

  public function getPrimaryKey()
  {
    return $this->primaryKey;
  }
}

class SmartSEO_Google_Service_MapsEngine_Table extends SmartSEO_Google_Collection
{
  public $bbox;
  public $creationTime;
  public $description;
  public $draftAccessList;
  public $etag;
  protected $filesType = 'SmartSEO_Google_Service_MapsEngine_MapsengineFile';
  protected $filesDataType = 'array';
  public $id;
  public $lastModifiedTime;
  public $name;
  public $processingStatus;
  public $projectId;
  public $publishedAccessList;
  protected $schemaType = 'SmartSEO_Google_Service_MapsEngine_Schema';
  protected $schemaDataType = '';
  public $sourceEncoding;
  public $tags;

  public function setBbox($bbox)
  {
    $this->bbox = $bbox;
  }

  public function getBbox()
  {
    return $this->bbox;
  }

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }

  public function getCreationTime()
  {
    return $this->creationTime;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDraftAccessList($draftAccessList)
  {
    $this->draftAccessList = $draftAccessList;
  }

  public function getDraftAccessList()
  {
    return $this->draftAccessList;
  }

  public function setEtag($etag)
  {
    $this->etag = $etag;
  }

  public function getEtag()
  {
    return $this->etag;
  }

  public function setFiles($files)
  {
    $this->files = $files;
  }

  public function getFiles()
  {
    return $this->files;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }

  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setProcessingStatus($processingStatus)
  {
    $this->processingStatus = $processingStatus;
  }

  public function getProcessingStatus()
  {
    return $this->processingStatus;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }

  public function getProjectId()
  {
    return $this->projectId;
  }

  public function setPublishedAccessList($publishedAccessList)
  {
    $this->publishedAccessList = $publishedAccessList;
  }

  public function getPublishedAccessList()
  {
    return $this->publishedAccessList;
  }

  public function setSchema(SmartSEO_Google_Service_MapsEngine_Schema $schema)
  {
    $this->schema = $schema;
  }

  public function getSchema()
  {
    return $this->schema;
  }

  public function setSourceEncoding($sourceEncoding)
  {
    $this->sourceEncoding = $sourceEncoding;
  }

  public function getSourceEncoding()
  {
    return $this->sourceEncoding;
  }

  public function setTags($tags)
  {
    $this->tags = $tags;
  }

  public function getTags()
  {
    return $this->tags;
  }
}

class SmartSEO_Google_Service_MapsEngine_TableColumn extends SmartSEO_Google_Model
{
  public $name;
  public $type;

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

class SmartSEO_Google_Service_MapsEngine_TablesListResponse extends SmartSEO_Google_Collection
{
  public $nextPageToken;
  protected $tablesType = 'SmartSEO_Google_Service_MapsEngine_Table';
  protected $tablesDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }

  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }

  public function setTables($tables)
  {
    $this->tables = $tables;
  }

  public function getTables()
  {
    return $this->tables;
  }
}

class SmartSEO_Google_Service_MapsEngine_VectorStyle extends SmartSEO_Google_Collection
{
  protected $displayRulesType = 'SmartSEO_Google_Service_MapsEngine_DisplayRule';
  protected $displayRulesDataType = 'array';
  protected $featureInfoType = 'SmartSEO_Google_Service_MapsEngine_FeatureInfo';
  protected $featureInfoDataType = '';
  public $type;

  public function setDisplayRules($displayRules)
  {
    $this->displayRules = $displayRules;
  }

  public function getDisplayRules()
  {
    return $this->displayRules;
  }

  public function setFeatureInfo(SmartSEO_Google_Service_MapsEngine_FeatureInfo $featureInfo)
  {
    $this->featureInfo = $featureInfo;
  }

  public function getFeatureInfo()
  {
    return $this->featureInfo;
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

class SmartSEO_Google_Service_MapsEngine_ZoomLevels extends SmartSEO_Google_Model
{
  public $max;
  public $min;

  public function setMax($max)
  {
    $this->max = $max;
  }

  public function getMax()
  {
    return $this->max;
  }

  public function setMin($min)
  {
    $this->min = $min;
  }

  public function getMin()
  {
    return $this->min;
  }
}
