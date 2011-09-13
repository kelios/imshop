<?php
/**
 * SSettings - Manager shop settings
 */
 
class SSettings {

    public $settings = array();

    public function __construct()
    {
        // Load and parse all settings
        $this->loadSettings();
    }

    /**
     * Load settings and store it in settings array
     *
     * @return void
     */
    public function loadSettings()
    {
        $model = ShopSettingsQuery::create()
               ->find();

        if (sizeof($model) > 0)
        {
            foreach($model as $row)
            {
                $this->settings[$row->getName()] = $row;
            }
        }
    }

    /**
     * Create new param and save it.
     *
     * @param  $name
     * @param  $value
     * @param  $create auto-create if not exists
     * @return void
     */
    public function set($name, $value, $create = true)
    {
        if (!array_key_exists($name, $this->settings) && $create === true)
        {
            $model = new ShopSettings;
            $model->setName($name);
            $model->setValue($value);
            $model->save();
            $this->settings[$name] = $model;
        }else{
            // Update
            $this->settings[$name]->setValue($value);
            $this->settings[$name]->save();
        }
    }

    /**
     * Save settings from array
     *
     * @param  $data
     * @return bool
     */
    public function fromArray(array $data, $create = true)
    {
        if (sizeof($data) > 0)
        {
            foreach ($data as $key=>$value)
            {
                $this->set($key,$value,$create);
            }
        }else{
            return false;
        }

    }

    /**
     * Get param value
     *
     * @param  $name
     * @return string or null
     */
    public function __get($name)
    {
        if (array_key_exists($name,$this->settings))
            return $this->settings[$name]->getValue();
        else
            return null;
    }
}
