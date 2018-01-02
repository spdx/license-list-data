#!/bin/sh

TOOLS=${TOOLS:-spdx-tools-*.jar}
LICENSE_XML=${LICENSE_XML:-../license-list-XML}
TEST_DATA=${TEST_DATA:-../license-test-files/simpleForGenerator}
EXPECTED_WARNINGS="\"Duplicates licenses: AGPL-3.0-or-later, AGPL-3.0-only\",\"Duplicates licenses: GFDL-1.1-or-later, GFDL-1.1-only\",\"Duplicates licenses: GFDL-1.2-or-later, GFDL-1.2-only\",\"Duplicates licenses: GFDL-1.3-or-later, GFDL-1.3-only\",\"Duplicates licenses: GPL-1.0-or-later, GPL-1.0-only\",\"Duplicates licenses: GPL-2.0-or-later, GPL-2.0-only\",\"Duplicates licenses: GPL-3.0-or-later, GPL-3.0-only\",\"Duplicates licenses: LGPL-2.0-or-later, LGPL-2.0-only\",\"Duplicates licenses: LGPL-2.1-or-later, LGPL-2.1-only\",\"Duplicates licenses: LGPL-3.0-or-later, LGPL-3.0-only\",\"Duplicates licenses: MPL-2.0, MPL-2.0-no-copyleft-exception\""

VERSION=$(git -C "${LICENSE_XML}" describe --always || echo 'UNKNOWN') &&
DATE=$(date -I) &&
echo "${EXPECTED_WARNINGS}" >expected-warnings &&
java -jar "${TOOLS}" LicenseRDFAGenerator "${LICENSE_XML}" . "${VERSION}" "${DATE}" "${TEST_DATA}" expected-warnings &&
rm -f expected-warnings
