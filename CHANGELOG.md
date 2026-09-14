### V5.0.3

- the change password action respects the app's user policy (`update`)
- bulk delete, roles and teams actions skip users the policy does not allow
- apps without a user policy keep full access

### V5.0.2

- fix creating a user throwing `Too few arguments to HashManager::make()` (#58)
- fix the change password action ignoring the entered password (#60, thanks @larsbo for #61)
- add regression tests for password hashing on create and change password

### V5.0.1

- add Laravel 13 support (Laravel 12 and 13, Testbench 10 and 11)
- allow Pest 4 and 5
- run the test matrix on Laravel 12/13 and PHP 8.3/8.4
- apply Pint formatting

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
