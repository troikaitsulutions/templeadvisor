<?php
if($XmlFeed) {
	$xmldata = '<?xml version="1.0" encoding="UTF-8"?>'; 
	$xmldata .='<properties>';
	foreach ($XmlFeed as $feed ) {
		$xmldata .='<property>';
		$xmldata .='<yourreference>'.$feed->id.'</yourreference>';
		$xmldata .='<name>'.preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $feed->name).'</name>';
		$xmldata .='<propertypage>'.GetPropertyURL($feed->id).'</propertypage>';
		$xmldata .='<location>';
		$Gps = Gps::model()->find(array('condition'=>"uid='$feed->uid'"));
		$xmldata .='<coordinates>'.$Gps->latitude.','.$Gps->longitude.'</coordinates>';
		$xmldata .='<country>'.$feed->Country->name.'</country>';
		$xmldata .='<region>'.$feed->regionname->name.'</region>';
		$xmldata .='<subregion> </subregion>';
		$xmldata .='<town>'.$feed->Town->name.'</town>';
		$xmldata .='<suburn> </suburn>';
		$xmldata .='</location>';
		$xmldata .='<propertytype>'.preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $feed->Type->name).'</propertytype>';
		$xmldata .='<summary>'.preg_replace('/&(?!#?[a-z0-9]+;)/','&amp;',utf8_encode(html_entity_decode($feed->content1))).'</summary>';
		$xmldata .='<sleepsMax>'.$feed->sleep.'</sleepsMax>';
		$xmldata .='<bedrooms>'.$feed->bedroom.'</bedrooms>';
		$xmldata .='<bathrooms>';
		$xmldata .='<familybathroom>'.$feed->bathroom.'</familybathroom>';
		$xmldata .='<showerbathroom>'.$feed->bathwshower.'</showerbathroom>';
		$xmldata .='<ensuite> </ensuite>';
		$xmldata .='</bathrooms>';
		$xmldata .='<LocalArea>';
		$xmldata .='<RegionDescription>'.preg_replace('/&(?!#?[a-z0-9]+;)/','&amp;',utf8_encode(html_entity_decode($feed->regionname->content))).'</RegionDescription>';
		$xmldata .='<TownDescription>'.preg_replace('/&(?!#?[a-z0-9]+;)/','&amp;',utf8_encode(html_entity_decode($feed->Town->content))).'</TownDescription>';
		$xmldata .='<ClosestAirport>';
		$xmldata .='<AirportName>'.$feed->nairport->name.'</AirportName>';
		$xmldata .='<DistanceKm>'.$feed->airport_km.'</DistanceKm>';
		$xmldata .='</ClosestAirport>';
		$xmldata .='<ClosestFerryPort>';
		$xmldata .='<FerryPortName> </FerryPortName>';
		$xmldata .='<DistanceKm> </DistanceKm>';
		$xmldata .='</ClosestFerryPort>';
		$xmldata .='<ClosestTrainStation>';
		$xmldata .='<TrainName>'.$feed->ntrain->name.'</TrainName>';
		$xmldata .='<DistanceKm>'.$feed->train_km.'</DistanceKm>';
		$xmldata .='</ClosestTrainStation>';
		$xmldata .='<DirectionsByCar></DirectionsByCar>';
		$xmldata .='</LocalArea>';
		$xmldata .='<photos> ';
		$Gallery = Gallery::model()->findAll(array('condition'=>"prop_id='$get_values->id'",'order'=>'img_order asc'));
		$i=0;
		foreach($Gallery as $image):
		$i=$i+1;
		$xmldata .='<photo number="'.$i.'">';
		$xmldata .='<photo> http://tt-prop-photos.s3.amazonaws.com/'.$feed->id.'/thumb/'.$image->img_url.'</photo>';
		$xmldata .='<caption>'.$image->description.'</caption>';
		$xmldata .='</photo>';
		endforeach;
		$xmldata .='</photos>';
		$xmldata .='<beds> ';
		$xmldata .='<single>'.$feed->sbed.'</single>';
		$xmldata .='<double></double>';
		$xmldata .='<sofabed>'.$feed->ssbed.'</sofabed>';
		$xmldata .='<cots></cots>';
		$xmldata .='</beds>';
		$xmldata .='<facilities>';
		$xmldata .='<CateringType>'.$this->amenities($feed->amenities,'catering type').'</CateringType>';
		$xmldata .='<HasFreezer>'.$this->amenities($feed->amenities,'freezer').'</HasFreezer>';
		$xmldata .='<HasToaster>'.$this->amenities($feed->amenities,'toaster').'</HasToaster>';
		$xmldata .='<HasKettle>'.$this->amenities($feed->amenities,'kettle').'</HasKettle>';
		$xmldata .='<HasVideo>'.$this->amenities($feed->amenities,'video').'</HasVideo>';
		$xmldata .='<HasDvd>'.$this->amenities($feed->amenities,'dvd').'</HasDvd>';
		$xmldata .='<HasPoolSnooker>'.$this->amenities($feed->amenities,'pool snooker').'</HasPoolSnooker>';
		$xmldata .='<HasPingPong>'.$this->amenities($feed->amenities,'pingpong').'</HasPingPong>';
		$xmldata .='<HasGamesRoom>'.$this->amenities($feed->amenities,'games room').'</HasGamesRoom>';
		$xmldata .='<HasJacuzziHotTub>'.$this->amenities($feed->amenities,'jacuzzi hottub').'</HasJacuzziHotTub>';
		$xmldata .='<HasTelephone>'.$this->amenities($feed->amenities,'telephone').'</HasTelephone>';
		$xmldata .='<HasSauna>'.$this->amenities($feed->amenities,'sauna').'</HasSauna>';
		$xmldata .='<HasClothesDryer>'.$this->amenities($feed->amenities,'clother dryer').'</HasClothesDryer>';
		$xmldata .='<HasCooker>'.$this->amenities($feed->amenities,'cooker').'</HasCooker>';
		$xmldata .='<HasFridge>'.$this->amenities($feed->amenities,'fridge').'</HasFridge>';
		$xmldata .='<HasHighchair>'.$this->amenities($feed->amenities,'highchair').'</HasHighchair>';
		$xmldata .='<HasSharedGarden>'.$this->amenities($feed->amenities,'').'</HasSharedGarden>';
		$xmldata .='<HasBoat>'.$this->amenities($feed->amenities,'shared garden').'</HasBoat>';
		$xmldata .='<HasPrivateFishing>'.$this->amenities($feed->amenities,'boat').'</HasPrivateFishing>';
		$xmldata .='<HasTrampoline>'.$this->amenities($feed->amenities,'trampoline').'</HasTrampoline>';
		$xmldata .='<HasSwingSet>'.$this->amenities($feed->amenities,'swingset').'</HasSwingSet>';
		$xmldata .='<HasClimbingFrame>'.$this->amenities($feed->amenities,'climbing frame').'</HasClimbingFrame>';
		$xmldata .='<HasPrivateTennisCourt>'.$this->amenities($feed->amenities,'private tennis court').'</HasPrivateTennisCourt>';
		$xmldata .='<HasSolariumRoofTerrace>'.$this->amenities($feed->amenities,'solarium roof terrace').'</HasSolariumRoofTerrace>';
		$xmldata .='<HasSeaView>'.$this->amenities($feed->amenities,'seaview').'</HasSeaView>';
		$xmldata .='<HasPoolForChildren>'.$this->amenities($feed->amenities,'pool for children').'</HasPoolForChildren>';
		$xmldata .='<HasPoolSharedOutdoorHeated>'.$this->amenities($feed->amenities,'pool shared outdoor heated').'</HasPoolSharedOutdoorHeated>';
		$xmldata .='<HasPoolSharedIndoor>'.$this->amenities($feed->amenities,'pool shared indoor').'</HasPoolSharedIndoor>';
		$xmldata .='<HasPoolPrivateOutdoorHeated>'.$this->amenities($feed->amenities,'pool private outdoor heated').'</HasPoolPrivateOutdoorHeated>';
		$xmldata .='<HasPoolPrivateOutdoorUnheated>'.$this->amenities($feed->amenities,'pool private outdoor unheated').'</HasPoolPrivateOutdoorUnheated>';
		$xmldata .='<HasPoolPrivateIndoor>'.$this->amenities($feed->amenities,'pool private indoor').'</HasPoolPrivateIndoor>';
		$xmldata .='<LinenProvided>'.$this->amenities($feed->amenities,'linen').'</LinenProvided>';
		$xmldata .='<TowelsProvided>'.$this->amenities($feed->amenities,'towels').'</TowelsProvided>';
		$xmldata .='<BicyclesAvailable>'.$this->amenities($feed->amenities,'bicycle').'</BicyclesAvailable>';
		$xmldata .='<StaffedProperty>'.$this->amenities($feed->amenities,'staffed property').'</StaffedProperty>';
		$xmldata .='<SuitableForChildren>'.$this->amenities($feed->amenities,'suitable for children').'</SuitableForChildren>';
		$xmldata .='<RestrictedMobility>'.$this->amenities($feed->amenities,'restricted mobility').'</RestrictedMobility>';
		$xmldata .='<WheelchairUsers>'.$this->amenities($feed->amenities,'wheel chair users').'</WheelchairUsers>';
		$xmldata .='<AvailableForHouseSwap>'.$this->amenities($feed->amenities,'house swap').'</AvailableForHouseSwap>';
		$xmldata .='<AvailableForLongLet>'.$this->amenities($feed->amenities,'longlet').'</AvailableForLongLet>';
		$xmldata .='<AvailableForHenStag>'.$this->amenities($feed->amenities,'henstag').'</AvailableForHenStag>';
		$xmldata .='<AvailableForShortBreaks>'.$this->amenities($feed->amenities,'short breaks').'</AvailableForShortBreaks>';
		$xmldata .='<HasPoolSharedOutdoorUnheated>'.$this->amenities($feed->amenities,'pool shared outdoor unheated').'</HasPoolSharedOutdoorUnheated>';
		$xmldata .='<HasAirConditioning>'.$this->amenities($feed->amenities,'air conditioning').'</HasAirConditioning>';
		$xmldata .='<HasFireplace>'.$this->amenities($feed->amenities,'fireplace').'</HasFireplace>';
		$xmldata .='<HasHydromassage>'.$this->amenities($feed->amenities,'hydromassage').'</HasHydromassage>';
		$xmldata .='<HasOven>'.$this->amenities($feed->amenities,'oven').'</HasOven>';
		$xmldata .='<HasMicrowave>'.$this->amenities($feed->amenities,'microwave').'</HasMicrowave>';
		$xmldata .='<HasWashingMachine>'.$this->amenities($feed->amenities,'washing machine').'</HasWashingMachine>';
		$xmldata .='<HasDishwasher>'.$this->amenities($feed->amenities,'dishwasher').'</HasDishwasher>';
		$xmldata .='<HasIron>'.$this->amenities($feed->amenities,'iron').'</HasIron>';
		$xmldata .='<AllowPets>'.$this->amenities($feed->amenities,'pets').'</AllowPets>';
		$xmldata .='<AllowSmoking>'.$this->amenities($feed->amenities,'smoking').'</AllowSmoking>';
		$xmldata .='<HasSafe>'.$this->amenities($feed->amenities,'safe').'</HasSafe>';
		$xmldata .='<HasCentralHeating>'.$this->amenities($feed->amenities,'central heating').'</HasCentralHeating>';
		$xmldata .='<ParkingAvailable>'.$this->amenities($feed->amenities,'parking').'</ParkingAvailable>';
		$xmldata .='<HasBeach>'.$this->amenities($feed->amenities,'beach').'</HasBeach>';
		$xmldata .='<HasTelevision>'.$this->amenities($feed->amenities,'television').'</HasTelevision>';
		$xmldata .='<HasSatelliteTV>'.$this->amenities($feed->amenities,'satellite tv').'</HasSatelliteTV>';
		$xmldata .='<HasHairdryer>'.$this->amenities($feed->amenities,'hair dryer').'</HasHairdryer>';
		$xmldata .='<HasPrivateGarden>'.$this->amenities($feed->amenities,'private garden').'</HasPrivateGarden>';
		$xmldata .='<HasBalconyOrTerrace>'.$this->amenities($feed->amenities,'balcony or terrace').'</HasBalconyOrTerrace>';
		$xmldata .='<RequiredVehicle>'.$this->amenities($feed->amenities,'vehicle').'</RequiredVehicle>';
		$xmldata .='<HasGym>'.$this->amenities($feed->amenities,'gym').'</HasGym>';
		$xmldata .='<HasSharedTennisCourt>'.$this->amenities($feed->amenities,'shared tennis court').'</HasSharedTennisCourt>';
		$xmldata .='<HasCot>'.$this->amenities($feed->amenities,'cot').'</HasCot>';
		$xmldata .='<HasSauna>'.$this->amenities($feed->amenities,'sauna').'</HasSauna>';
		$xmldata .='<AvailableForCorporate>'.$this->amenities($feed->amenities,'corporate').'</AvailableForCorporate>';
		$xmldata .='<HasElevator>'.$this->amenities($feed->amenities,'elevator').'</HasElevator>';
		$xmldata .='<HasWiFi>'.$this->amenities($feed->amenities,'wifi').'</HasWiFi>';
		$xmldata .='<HasInternetAccess>'.$this->amenities($feed->amenities,'internet access').'</HasInternetAccess>';
		$xmldata .='<HasBus>'.$this->amenities($feed->amenities,'bus').'</HasBus>';
		$xmldata .='<HasFax>'.$this->amenities($feed->amenities,'fax').'</HasFax>';
		$xmldata .='<HasStereo>'.$this->amenities($feed->amenities,'stereo').'</HasStereo>';
		$xmldata .='<HasBarbecue>'.$this->amenities($feed->amenities,'barbecue').'</HasBarbecue>';
		$xmldata .='</facilities>';
		$xmldata .='</property>';
	}
	$xmldata .='</properties>';
}


$FeedPartner = Feedlist::model()->findByPk($id);

$folderpath = '../resources/feeds/'.toSlug($FeedPartner->name);

if (!file_exists($folderpath)) 
{
	mkdir($folderpath,0777);
}
if(file_put_contents($folderpath.'/feed.xml',$xmldata)){ /*echo htmlspecialchars(file_get_contents($folderpath."/feed.xml"));*/ echo $folderpath.'/feed.xml file created successfully'; }
					
?>