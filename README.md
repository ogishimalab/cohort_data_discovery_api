# Cohort Data Discovery Api


Cohort data discovery APIは、大規模コホート研究のデータ発見のためにデザイン・実装されたAPI機能およびエンドポイントです。大規模コホート研究は、特に多因子疾患のprecision medicineの実装のために、多種類かつ大量のデータを収集しています。一方で、どのコホート研究でどのようなデータを収集しているかのデータ発見が困難であり、mega cohortの構築が不可能な状態となっている。
このAPIでは、我々が標準化を行ったcohort-, collection- and individual-level metadataおよび、分布情報などのデータエレメントの統計的特性をハンドルし、データベースの検索を通じてJSON形式で返却することで、研究者が研究対象とするデータセットが含まれるコホート、コレクション、データエレメントのセットの発見を促進する。



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
