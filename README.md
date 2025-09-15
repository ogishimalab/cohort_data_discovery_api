# Cohort data discovery API

This project develops a Cohort data discovery API, which provides both the API function and endpoint designed for efficient data discovery from large-scale cohort studies. In such studies, aimed at implementing precision medicine for multifactorial diseases, enormous amounts of data are collected, including lifestyle data, laboratory test results, physiological data, clinical records, lifelog data, and genome and other omics datasets. Due to the sheer scale and complexity of these data, achieving effective data discovery poses a significant hurdle, particularly when attempting to integrate and develop mega-cohorts from existing cohort resources.

As the standard of the minimum data element of biobank-related data including large-scale cohort data, the Minimum Information About BIobank data Sharing (MIABIS) has been developed. 
Ths MIABIS has a three-layered structure consising of
- biobank
- collections
- indvidual components
[Eklund N et al, Biopreserv Biobank. 2020(https://www.liebertpub.com/doi/10.1089/bio.2019.0129)]。

Accorging to the three-leayerd structure of MIABIS, ths Cohort Data Discovery API handles of
- Our standardized metadata
  - cohort-level metadata (about characteristics of cohort including summary, enrollment and species of the collected data）
  - collection-level metadata (about characteristics of the collection including upper cohort name and data collection period）
  - individual-level metadata (about characteristics of data elements derived from individual events including provenances and standard identifiers of data elements）
- statistical properties of the data elements
  - distributions of indivisual items
  - items for visualization (such as axies information)
The handled metadata and statistical properties are retuned by JSON format through search of database.
Our developed API facilitates the discovery of the research target sets of cohort, collection and dataelement.

## Requirenent
Laravel framework version 8.0 and PHP 7.4

## Usage
1. Install and setting of Laravel, PHP and mySQL
2. Create mySQL database
3. （Optional) Develop web interface for visualization
# Specifications
See [specifications](https://github.com/ogishimalab/cohort_data_discovery_api/blob/main/API/specifications.md)

## Licensing
MIT License

## Citation
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
