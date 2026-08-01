# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [3.0.3] - 2026-08-01

### Fixed

- Added shared accessors for standard AMI channel headers to all event classes.
- Added inherited `ConnectedLineNum` and `ConnectedLineName` accessors to
  `HangupEvent`.

## [3.0.2] - 2026-08-01

### Fixed

- Added a `Linkedid` accessor to `NewchannelEvent`.

## [3.0.1] - 2026-08-01

### Fixed

- Added `Context`, `Exten`, and `Linkedid` accessors to `NewstateEvent`.
- Added `Context` and `Linkedid` accessors to `HangupEvent`.

## [3.0.0] - 2026-08-01

### Added

- Added support for PHP 8.4 and newer PHP 8.x releases.
- Added support for `psr/log` versions 1, 2, and 3.
- Added and improved CDR event handling.

### Changed

- Renamed the Composer package to `hamkaran/pami`.
- Updated the test tooling for PHPUnit 11 compatibility.
- Improved linting, syntax checks, and PSR-12 conformance.
- Modernized code for current PHP compatibility, including the required
  separator-first argument order for `implode()`.

[3.0.3]: https://github.com/amir200xven/PAMI/compare/v3.0.2...v3.0.3
[3.0.2]: https://github.com/amir200xven/PAMI/compare/v3.0.1...v3.0.2
[3.0.1]: https://github.com/amir200xven/PAMI/compare/v3.0.0...v3.0.1
[3.0.0]: https://github.com/amir200xven/PAMI/releases/tag/v3.0.0
