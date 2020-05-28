<?php
if(!defined('INITIALIZED'))
	exit;
class Shop extends ObjectData {
	
	const LOADTYPE_ID = 'id';
	const LOADTYPE_CATEGORY = 'category';
	const LOADTYPE_TYPE = 'offer_type';
	public static $table = 'z_shop_offer';
	public $data = array('category' => null, 'coins' => null, 'price' => null, 'itemid' => null, 'count' => null, 'offer_type' => null, 'offer_image' => null, 'offer_description' => null, 'offer_name' => null, 'offer_date' => null, 'default_image' => null);
	public static $fields = array('id','category','coins','price','itemid','count','offer_type','offer_image','offer_description','offer_name','offer_date','default_image');
	
	public function __construct($search_text = null, $search_by = self::LOADTYPE_ID)
    {
		if($search_text != null)
			$this->load($search_text, $search_by);
    }
	
	public function load($search_text, $search_by = self::LOADTYPE_ID)
	{
		if(in_array($search_by, self::$fields))
			$search_string = $this->getDatabaseHandler()->fieldName($search_by) . ' = ' . $this->getDatabaseHandler()->quote($search_text);
		else
			new Error_Critic('', 'Wrong Account search_by type.');
		$fieldsArray = array();
		foreach(self::$fields as $fieldName)
			$fieldsArray[$fieldName] = $this->getDatabaseHandler()->fieldName($fieldName);
		$this->data = $this->getDatabaseHandler()->query('SELECT ' . implode(', ', $fieldsArray) . ' FROM ' . $this->getDatabaseHandler()->tableName(self::$table) . ' WHERE ' . $search_string)->fetch();
	}
	
	public function loadById($id)
	{
		$this->load($id, 'id');
	}
	
	public function loadByCategory($category)
	{
		$this->load($category, 'category');
	}
	
	public function loadByType($type)
	{
		$this->load($type, 'offer_type');
	}
	
	public function save($forceInsert = false)
	{
		if(!isset($this->data['id']) || $forceInsert)
		{
			$keys = array();
			$values = array();
			foreach(self::$fields as $key)
				if($key != 'id')
				{
					$keys[] = $this->getDatabaseHandler()->fieldName($key);
					$values[] = $this->getDatabaseHandler()->quote($this->data[$key]);
				}
			$this->getDatabaseHandler()->query('INSERT INTO ' . $this->getDatabaseHandler()->tableName(self::$table) . ' (' . implode(', ', $keys) . ') VALUES (' . implode(', ', $values) . ')');
			$this->setID($this->getDatabaseHandler()->lastInsertId());
		}
		else
		{
			$updates = array();
			foreach(self::$fields as $key)
				if($key != 'id')
					$updates[] = $this->getDatabaseHandler()->fieldName($key) . ' = ' . $this->getDatabaseHandler()->quote($this->data[$key]);
			$this->getDatabaseHandler()->query('UPDATE ' . $this->getDatabaseHandler()->tableName(self::$table) . ' SET ' . implode(', ', $updates) . ' WHERE ' . $this->getDatabaseHandler()->fieldName('id') . ' = ' . $this->getDatabaseHandler()->quote($this->data['id']));
		}
	}
	
	public function delete()
    {
        $this->getDatabaseHandler()->query('DELETE FROM ' . $this->getDatabaseHandler()->tableName(self::$table) . ' WHERE ' . $this->getDatabaseHandler()->fieldName('id') . ' = ' . $this->getDatabaseHandler()->quote($this->data['id']));

        unset($this->data['id']);
    }
	
	public function getId(){return $this->data['id'];}
	public function setCategory($category){$this->data['category'] = $category;}
	public function getCategory(){return $this->data['category'];}
	public function setPoints($points){$this->data['premium_points'] = $points;}
	public function getPoints(){return $this->data['premium_points'];}
	public function setPrice($price){$this->data['price'] = $price;}
	public function getPrice(){return $this->data['price'];}
	public function setItemId($itemid){$this->data['price'] = $itemid;}
	public function getItemId(){return $this->data['itemid'];}
	public function setCount($count){$this->data['count'] = $count;}
	public function getCount(){return $this->data['count'];}
	public function setType($type){$this->data['offer_type'] = $type;}
	public function getType(){return $this->data['offer_type'];}
	public function setImage($image){$this->data['offer_image'] = $image;}
	public function getImage(){return $this->data['offer_type'];}
	public function setDesc($desc){$this->data['offer_description'] = $desc;}
	public function getDesc(){return $this->data['offer_description'];}
	public function setName($name){$this->data['offer_name'] = $name;}
	public function getName(){return $this->data['offer_name'];}
	public function setDate($date){$this->data['offer_date'] = $date;}
	public function getDate(){return $this->data['offer_date'];}
	public function setDefaultImage($default){$this->data['default_image'] = $default;}
	public function getDefaultImage(){return $this->data['default_image'];}
	
}