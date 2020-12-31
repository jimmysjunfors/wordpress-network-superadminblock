# WordPress Network Super Admin blocker

Simple drop-in plugin to block certain WordPress Network Super Admin users from network access, and possibly plugin/theme access.

## Who needs this plugin

If you need admin users to be able to edit/work on all sites in your network without adding the specific users to all your sites, this plugin enables you to add Super Admin users with no access to network related settings/privileges.

## Installation

1) Add usernames of Super Admins whom should have network access to array wpnsa_allowed_superusers
2) Choose to block plugin and/or theme access aswell
3) Upload to plugins folder and network activate, or add it to mu-plugins folder
4) Done, now your other Super Admin users can edit all sites in your network, without network admin access

### Note

Make sure to add at least one Super Admin username to the array, or network admin will be inaccessible.

Add your own specific filters to block, if you have something a regular site admin user should not have access to.