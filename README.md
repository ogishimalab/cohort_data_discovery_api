# Cohort Data Discovery API


Cohort data discovery APIは、大規模コホート研究のデータ発見のためにデザイン・実装されたAPI機能およびエンドポイントです。大規模コホート研究は、特に多因子疾患のprecision medicineの実装のために、多種類かつ大量のデータを収集しています。一方で、どのコホート研究でどのようなデータを収集しているかのデータ発見が困難であり、mega cohortの構築が不可能な状態となっている。

大規模コホートデータを含むバイオバンク関連データの標準は、the minimum data element of biobank-related data, including large-scale cohort data（MIABIS）の、
- biobank
- collections
- indvidual components

の3つの層が定義されている[Eklund N et al, Biopreserv Biobank. 2020(https://www.liebertpub.com/doi/10.1089/bio.2019.0129)]。
このAPIでは、MIABISで定義されている3層構造に従い、
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

# Ussge
1. Laravel, PHP, mySQLのインストール、設定
2. mySQLデータベースのcreate (create文を用意）
3. （Optional) 可視化のためのWebインターフェースを用意する

# Specifications
See specifications

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
