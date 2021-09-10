<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Thanks again! Now go create something AMAZING! :D
***
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

<!-- PROJECT LOGO -->
<br />
<p align="center">

![Screenshot](https://github.com/edenai/edenai-python/blob/3829feb170f11cfd55aacd877d23c5f8d69e203f/Logo%20complet%20Eden%20AI%20-%20format%20PNG.png)
  <h3 align="center">Eden AI</h3>

  <p align="center">
    Eden AI simplifies the use and integration of AI technologies by providing a unique API connected to the best AI engines and combined with a powerful management platform
    <br />
    <a href="https://api.edenai.run/v1/redoc/"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://www.edenai.co/">View Demo</a>
    ·
    <a href="https://github.com/edenai/edenai-php/issues">Report Bug</a>
    ·
    <a href="https://github.com/edenai/edenai-php/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#license">License</a></li>
  </ol>
</details>



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

* Composer(https://getcomposer.org/download/)

### Installation

1. Install Composer packages
   ```sh
    composer require edenai/php-sdk
   ```
2. Create an account at https://app.edenai.run/user/register
   
   
3. Get your API KEY


<!-- USAGE EXAMPLES -->
## Usage

You can use this package by initiating your desired class using the generate API KEY from your account just like the example:

(for possible values visit https://api.edenai.run/v1/redoc/)

```PHP
  require_once '../vendor/autoload.php';

  use EdenAI\Text;
  $text = new Text("API_KEY");
  $output = $text->keywordExtraction(string $text[, array $providers ][, string $language]);
```
<table>
    <tr>
        <th>Class</th>
        <th>Methods</th>
        <th>Parameters</th>
    </tr>
    <tr>
        <td rowspan='12' colspan='1'>Text</td>
        <td rowspan='3' colspan="1">keywordExtraction()</td>
        <td>String $text (required)</td>
    </tr>
    <tr>
        <td> Array $providers (optional) </td>
    </tr>
    <tr>
        <td> String $language (optional) </td>
    </tr>
    <tr>
        <td rowspan='3' colspan="1">namedEntityRecognition()</td>
        <td>String $text (required)</td>
    </tr>
    <tr>
        <td> Array $providers (optional) </td>
    </tr>
    <tr>
        <td> String $language (optional) </td>
    </tr>
    <tr>
        <td rowspan='3' colspan="1">sentimentAnalysis()</td>
        <td>String $text (required)</td>
    </tr>
    <tr>
        <td> Array $providers (optional) </td>
    </tr>
    <tr>
        <td> String $language (optional) </td>
    </tr>
    <tr>
        <td rowspan='3' colspan="1">syntaxAnalysis()</td>
        <td>String $text (required)</td>
    </tr>
    <tr>
        <td> Array $providers (optional) </td>
    </tr>
    <tr>
        <td> String $language (optional) </td>
    </tr>
    <tr>
        <td rowspan='6' colspan='1'>Translation</td>
        <td rowspan='4' colspan="1">automaticTranslation()</td>
        <td>String $text (required)</td>
    </tr>
    <tr>
        <td> Array $source_language (required) </td>
    </tr>
    <tr>
        <td> Array $target_language (required) </td>
    </tr>
    <tr>
        <td> String $language (optional) </td>
    </tr>
    <tr>
        <td rowspan='2' colspan="1">languageDetection()</td>
        <td>String $text (required)</td>
    </tr>
    <tr>
        <td> Array $providers (optional) </td>
    </tr>
    <tr>
        <td rowspan='6' colspan='1'>OCR</td>
        <td rowspan='3' colspan="1">OCRInvoice()</td>
        <td>String $file (required)</td>
    </tr>
    <tr>
        <td> String $language (optional) </td>
    </tr>
    <tr>
        <td> Array $providers (optional) </td>
    </tr>
    <tr>
        <td rowspan='3' colspan="1">OCR()</td>
        <td>String $file (required)</td>
    </tr>
    <tr>
        <td> String $language (optional) </td>
    </tr>
    <tr>
        <td> Array $providers (optional) </td>
    </tr>
    <tr>
        <td rowspan='6' colspan='1'>Vision</td>
        <td rowspan='2' colspan="1">explicitContentDetection()</td>
        <td>String $file (required)</td>
    </tr>
    <tr>
        <td> Array $providers (optional) </td>
    </tr>
    <tr>
        <td rowspan='2' colspan="1">faceDetection()</td>
        <td>String $file (required)</td>
    </tr>
    <tr>
        <td> Array $providers (optional) </td>
    </tr>
    <tr>
        <td rowspan='2' colspan="1">objectDetection()</td>
        <td>String $file (required)</td>
    </tr>
    <tr>
        <td> Array $providers (optional) </td>
    </tr>
    <tr>
        <td rowspan='9' colspan='1'>Speech</td>
        <td rowspan='4' colspan="1">speechRecognition()</td>
        <td>String $file (required)</td>
    </tr>
    <tr>
        <td> String $language (optional) </td>
    </tr>
    <tr>
        <td> Array $providers (optional) </td>
    </tr>
    <tr>
        <td> Boolean $fake_call (optional) </td>
    </tr>
    <tr>
        <td rowspan='5' colspan="1">textToSpeech()</td>
        <td>String $text (required)</td>
    </tr>
    <tr>
        <td> String $language (optional) </td>
    </tr>
    <tr>
        <td> String $option (optional) (MALE or FEMALE) </td>
    </tr>
    <tr>
        <td> Array $providers (optional) </td>
    </tr>
    <tr>
        <td> String $fake_call (optional) </td>
    </tr>
</table>  


<!-- Tests -->
## Tests
Specify API key in tests/mainTest.php

You can launch tests using:
```sh
    composer test
   ```

<!-- LICENSE -->
## License

Distributed under the Apache-2.0 License. See `LICENSE` for more information.
