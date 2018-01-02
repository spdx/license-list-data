FORMATS = html json licenses.md rdfa rdfnt rdfturtle rdfxml template text website
TOOL_VERSION = 2.1.8
LICENSE_XML = ../license-list-XML
TEST_DATA = ../license-test-files

.PHONY: all
all: build.sh spdx-tools-$(TOOL_VERSION).jar-valid resources/licenses-full.json $(LICENSE_XML) $(TEST_DATA)
	TOOLS=spdx-tools-$(TOOL_VERSION).jar LICENSE_XML="$(LICENSE_XML)" TEST_DATA=$(TEST_DATA) ./build.sh

.PRECIOUS: spdx-tools-%.jar
spdx-tools-%.jar:
	curl -L https://dl.bintray.com/spdx/spdx-tools/org/spdx/spdx-tools/$*/spdx-tools-$*-jar-with-dependencies.jar >$@

.PRECIOUS: spdx-tools-%.jar.asc
spdx-tools-%.jar.asc:
	curl -L https://dl.bintray.com/spdx/spdx-tools/org/spdx/spdx-tools/$*/spdx-tools-$*-jar-with-dependencies.jar.asc >$@

.PHONY: spdx-tools-%.jar-valid
spdx-tools-%.jar-valid: spdx-tools-%.jar.asc spdx-tools-%.jar goneall.gpg
	gpg --verify --no-default-keyring --keyring ./goneall.gpg $<

resources/licenses-full.json: resources
	curl -L https://wking.github.io/fsf-api/licenses-full.json >$@

resources:
	mkdir -p $@

.PHONY: clean
clean:
	rm -rf ${FORMATS}

.PHONY: full-clean
full-clean: clean
	rm -rf resources spdx-tool-*.jar
