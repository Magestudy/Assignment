
# Get the post action from custom form(frontend) to controller to save the values in system config fields in Magento 2

Form fields: Licence number, Group, Params

### Custom form fields types(text) from Frontend

Form fields: Licence number, Group, Params

## Main Functionalities
Display Custom Form on Front End and save data in config fields via $this->configWriter->save 

To get the Post request from frontend and save the data via controller in config fields

For example:
```php	$post = (array) $this->getRequest()->getPost(); //get post request for form data
		if (!empty($post)) {
            // Retrieve form data
            $livechat_license_number   = $post['livechat_license_number'];
            $livechat_groups           = $post['livechat_groups'];
            $livechat_params           = $post['livechat_params'];
			$this->configWriter->save('livechat/general/license', $livechat_license_number);
			$this->configWriter->save('livechat/advanced/group',  $livechat_groups);
			$this->configWriter->save('livechat/advanced/params', $livechat_params);
```			


Also created system config fields via adminhtml/system.xml file.   
For example:

```xml
			<group id="advanced" translate="label" type="text" sortOrder="1" showInDefault="1" showInWebsite="1" showInStore="1">
					<label>Live Chat group and Params</label>
					<!-- Create field for Live chat group -->
					<field id="group" translate="label"   type="text" sortOrder="2" showInDefault="1" showInWebsite="1" showInStore="1">
						<label>Group</label>
						<validate>required-entry</validate>
					</field>
					<!-- Create field for Live chat params -->
					<field id="params" translate="label"  type="text" sortOrder="3" showInDefault="1" showInWebsite="1" showInStore="1">
						<label>Params</label>
					</field>
					</group>
```
Note: To show the values in system config fields in admin then need to clean the cache.

## Please clone the module directory for installation 

git clone git@github.com:shiwani1992/Assignment.git

### Type 1: Zip file
- Unzip the zip file in `app/code/Testing`
- Enable the module by running `php bin/magento module:enable Testing_Assignment`
- Apply database updates by running `php bin/magento setup:upgrade`
- Flush the cache by running `php bin/magento cache:flush`
 
 
## Type 2: Will work on to installation via composer

Inprogress 

## Specifications&Requirements

Built on Magento 2.4.4

Required php >=8.0
