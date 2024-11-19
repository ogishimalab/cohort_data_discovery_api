# Cohort Data Discovery API


Cohort data discovery API is the API function and API endpoint designed and implemented for data discovery from large-scale cohort studies. 
In the large-scale cohort studies, to implement precision
medicine for multifactorial diseases, wide variety of large amounts of data are collection including lifestyle data, laboratory data,
physiological data, clinical data, lifelog data, and genome and omics data. On the other hands, there is a hurdle to achieve data discovery from collected data in the cohort studies to develp mega cohorts.


As the standard of the minimum data element of biobank-related data including large-scale cohort data, the  the Minimum Information About BIobank data Sharing (MIABIS) has been developed. 
Ths MIABIS has a three-layered structure consising of;
- biobank
- collections
- indvidual components
[Eklund N et al, Biopreserv Biobank. 2020(https://www.liebertpub.com/doi/10.1089/bio.2019.0129)]。

Accorging to the three-leayerd structure of MIABIS, ths Cohort Data Discovery API handles 
- 我々が標準化を行ったメタデータ
  - コホートレベルメタデータ（コホートのサマリー、登録、収集データの種別などのコホートの特徴を表すメタデータ）
  - コレクションレベルメタデータ（Upper cohort nameやデータ収集期間などのコレクションの特徴を表すメタデータ）
  - individual-level metadata（individual eventsから発生するデータエレメントの由来、standard identifiersを含む特徴を表すメタデータ）
および、
- データエレメントの統計的特性統計的性質
  - 分布情報
  - 軸情報などの可視化のためのitems
をハンドルし、データベースの検索を通じてJSON形式で返却することで、研究者が研究対象とするデータセットが含まれるコホート、コレクション、データエレメントのセットの発見を促進する。


# Requirenent
Laravel framework version 8.0 and PHP 7.4

# Usage
1. Install and setting of Laravel, PHP and mySQL
2. Create mySQL database
3. （Optional) Develop web interface for visualization
# Specifications
See [specifications](https://github.com/ogishimalab/cohort_data_discovery_api/blob/main/API/specifications.md)

# Licensing
MIT License

# Citation
If you utilize this repository, data in a downstream project, please consider citing it with:

```
@misc{cohort_data_discovery_api,
  author = {Satoshi Mizuno, Satoshi Nagaie, Ryosuke Ishiwata, Atsushi Hozawa, Masayuki Yamamoto, Soichi Ogishima},
  title = {Designing and implementing application programming interfaces (APIs) to discover data from large-scale cohort studies to develop the mega cohort},
  year = {2024},
  publisher = {GitHub},
  journal = {GitHub repository},
  howpublished = {\url{https://github.com/ogishimalab/cohort_data_discovery_api}},
```
