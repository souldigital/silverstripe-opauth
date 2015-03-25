<?php
class OpauthMemberExtension extends DataExtension {

	private static $has_many = array(
		"OpauthIdentities" => "OpauthIdentity"
	);

	public function onBeforeDelete() {
		$this->owner->OpauthIdentities()->removeAll();
	}

	/**
	 * @return bool|OpauthIdentity
	 */
	public function getOpauthIdentityByName($provider_name){
		if(!$this->owner->exists()) return false;
		return $this->owner->OpauthIdentities()->find("Provider",$provider_name);
	}

}