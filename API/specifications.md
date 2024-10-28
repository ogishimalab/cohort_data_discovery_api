# Specifications of APIs


### API/routes/API.php
APIルートを記述し、以下のAPIエンドポイントが登録されている。それぞれのAPIエンドポイントは、JwtController.phpの各API機能を呼び出し、バックエンドのデータベースから必要なデータを取得し、JSON形式で返却する。

1. cohortLevelMetadata
- 呼び出されるAPI機能：cohortLevelMetadata
2. dataCollection
- 呼び出されるAPI機能：dataCollection
3. searchAllItems/{data_collection_id}
- 呼び出されるAPI機能：searchAllItems
4. searchItemsHierarchy/{data_collection_id}/{parent_id?}
- 呼び出されるAPI機能：searchItemsHierarchy
5. itemLevelMetadata/{data_collection_id}/{item_id}/{stratification_type?}
- 呼び出されるAPI機能：itemLevelMetadata
6. statisticalData/{data_collection_id}/{item_id}/{stratification_type?}
- 呼び出されるAPI機能：statisticalData


### API/app/Controllers/JwtController.php
各APIエンドポイントから呼び出されるAPI機能

1. cohortLevelMetadata
- 説明
  - This API endpoint provides functions for fetching both cohort-level and collection-level metadata.
- 引数
  - data_collection_id
- Returns
  - cohortLevelMetadataKey
  - cohortLevelMetadataValue
 
2. dataCollection
- 説明
  - コレクションのリストを取得する
- 引数
  - なし
- Returns
  - dataCollectionID
  - releaseDate
  - dataCollectionName

3.searchAllItems
- 説明
  - コレクションに含まれるすべての項目を取得する
- 引数
  - data_collection_id
- Returns
  - id
  - dataCollectionID
  - itemID
  - itemName
  - parentGroupId

4.searchItemsHierarchy
- 説明
  - コレクションのitemsの階層構造の中の特定の親項目に関連づけられた項目セットを取得する
- 引数
  - data_collection_id
  - parent_id
- Returns 
  - id
  - dataCollectionID
  - itemID
  - itemName
  - parentGroupId
    
5. itemLevelMetadata
- 説明
  - individual-letel metadataを取得する
- 引数
  - data_collection_id
  - item_id
  - stratification_type
- Returns 
  - itemID
  - conceptMapping
  - itemName
  - stratificationType
  - itemCategory
  - measuredNumber
  - obtainedDataNumber
  - dataType
  - unit
  - description
  - collectionStatus
  
6. statisticalData
- 説明
  - コレクションのtarget itemsの統計データを取得する
- 引数
  - data_collection_id
  - item_id
  - stratification_type
- Returns 
  - itemId
  - displayitemCode
  - stratificationType
  - breaks
  - breaksCounts
  - xLabel
  - yLabel
  - supportingInformation
  - graphType
  - barplotLegend
  - barplotLegendFormat
  - histgramScale
  - histgramScaleFormat
