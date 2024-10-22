# Cohort Data Discovery Api


Cohort data discovery APIは、


The OpenAPI Specification is a community-driven open specification within the OpenAPI Initiative, a Linux Foundation Collaborative Project.

The OpenAPI Specification (OAS) defines a standard, programming language-agnostic interface description for HTTP APIs. This allows both humans and computers to discover and understand the capabilities of a service without requiring access to source code, additional documentation, or inspection of network traffic. When properly defined via OpenAPI, a consumer can understand and interact with the remote service with a minimal amount of implementation logic. Similar to what interface descriptions have done for lower-level programming, the OpenAPI Specification removes guesswork in calling a service.

Use cases for machine-readable API definition documents include, but are not limited to: interactive documentation; code generation for documentation, clients, and servers; and automation of test cases. OpenAPI documents describe API services and are represented in YAML or JSON formats. These documents may be produced and served statically or generated dynamically from an application.

The OpenAPI Specification does not require rewriting existing APIs. It does not require binding any software to a service – the described service may not even be owned by the creator of its description. It does, however, require that the service's capabilities be described in the structure of the OpenAPI Specification. Not all services can be described by OpenAPI – this specification is not intended to cover every possible style of HTTP APIs, but does include support for REST APIs. The OpenAPI Specification does not mandate a specific development process such as design-first or code-first. It does facilitate either technique by establishing clear interactions with an HTTP API.

This GitHub project is the starting point for OpenAPI. Here you will find the information you need about the OpenAPI Specification, simple examples of what it looks like, and some general information regarding the project.

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
@misc{localai,
  author = {Satoshi Mizuno, Satoshi Nagaie, Ryosuke Ishiwata, Atsushi Hozawa, Masayuki Yamamoto, Soichi Ogishima},
  title = {Designing and implementing application programming interfaces (APIs) to discover data from large-scale cohort studies to develop the mega cohort},
  year = {2024},
  publisher = {GitHub},
  journal = {GitHub repository},
  howpublished = {\url{https://github.com/ogishimalab/cohort_data_discovery_api}},
```
