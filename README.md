# Create Custom Customer Attribute for Magento2 Open Source

This is the simple module for adding custom customer attribute in magento2 open source.

## Installation

##### By using archive
1. Download an archive of the repo and unzip it
2. Copy and paste it to Magento instance root directory/app/code
3. Run the upgrade commands on the root of Magento instance to install our module. 
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
php bin/magento indexer:reindex
php bin/magento cache:flush
