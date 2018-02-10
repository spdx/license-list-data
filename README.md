# License List Data

See [the contributing document](CONTRIBUTING.md) for information on requesting new licenses, reporting issues or contributing pull requests related to this repository.

This repository contains various generated data formats for the [SPDX License List](http://spdx.org/licenses/) including RDFa, HTML, Text, and JSON. The source of the license list which generates these data files can be found at https://github.com/spdx/license-list-XML.  Please note that the format for the license-list-XML repository is internal to the SPDX legal team and is subject to change.

See the file accessingLicenses.md for an description on how to programatically access the SPDX license list.

The following directories contain the license list in the format specified:

* `html` - Simple HTML format of the files. (*Note:* These pages are not complete and valid HTML files, but simply HTML snippets for the license text.)
* `json` - JSON format for the license list.
* `rdfa` - RDFa/HTML format for the license list.
* `rdfnt` - RDF NT format for the license list.
* `rdfturtle` - RDF turtle format for the license list.
* `rdfxml` - RDF/XML format for the license list.
* `template` - SPDX template files per the license templates specified in the SPDX 2.0 specification appendix.  Deprecated licenses start with "deprecated_".
* `text` - Simple text files.  Deprecated licenses start with "deprecated_".
* `website` - HTML generated for the http://spdx.org/ website.

The file licenses.md is a table of contents for the generated licenses.  The links for the files point to the text for the license.