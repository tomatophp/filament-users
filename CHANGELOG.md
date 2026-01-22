### V5.0.0

- upgrade to Filament v5
- add `declare(strict_types=1)` to all PHP files
- refactor code to use early returns instead of else clauses
- add strict comparison to all `in_array()` calls
- add named arguments for clarity (`strict:`, `default:`)
- fix `dehydrated()` callback in Password component for proper form submission
- fix syntax error in ImpersonateAction (`new self` → `(new self)`)
- remove dead code in TeamsTable (duplicate if/else branches)
- remove redundant `__construct()` override in FilamentUserTeamsCommand
- replace `?:` with `??` for null coalescing in config fallbacks
- add `mago.toml` configuration for static analysis
- update `useAvatar()`, `useUserResource()`, `useTeamsResource()` to accept `bool|callable`

### V1.1.7

- update packages to the last version

### V2.0.0

- move namespace to TomatoPHP
- update to filamentv3.0
