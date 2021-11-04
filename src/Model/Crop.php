<?php
/**
 * Crop
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  Shotstack\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Shotstack
 *
 * Shotstack is a video, image and audio editing service that allows for the automated generation of videos, images and audio using JSON and a RESTful API.  You arrange and configure an edit and POST it to the API which will render your media and provide a file  location when complete.  For more details visit [shotstack.io](https://shotstack.io) or checkout our [getting started](https://shotstack.gitbook.io/docs/guides/getting-started) documentation. There are two main API's, one for editing and generating assets (Edit API) and one for managing hosted assets (Serve API).  The Edit API base URL is: <b>https://api.shotstack.io/{version}</b>  The Serve API base URL is: <b>https://api.shotstack.io/serve/{version}</b>
 *
 * The version of the OpenAPI document: v1
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Shotstack\Client\Model;

use \ArrayAccess;
use \Shotstack\Client\ObjectSerializer;

/**
 * Crop Class Doc Comment
 *
 * @category Class
 * @description Crop the sides of an asset by a relative amount. The size of the crop is specified using a scale between 0 and 1, relative to the screen width - i.e a left crop of 0.5 will crop half of the asset from the left, a top crop  of 0.25 will crop the top by quarter of the asset.
 * @package  Shotstack\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null  
 */
class Crop implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Crop';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'top' => 'float',
        'bottom' => 'float',
        'left' => 'float',
        'right' => 'float'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'top' => 'float',
        'bottom' => 'float',
        'left' => 'float',
        'right' => 'float'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'top' => 'top',
        'bottom' => 'bottom',
        'left' => 'left',
        'right' => 'right'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'top' => 'setTop',
        'bottom' => 'setBottom',
        'left' => 'setLeft',
        'right' => 'setRight'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'top' => 'getTop',
        'bottom' => 'getBottom',
        'left' => 'getLeft',
        'right' => 'getRight'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['top'] = $data['top'] ?? null;
        $this->container['bottom'] = $data['bottom'] ?? null;
        $this->container['left'] = $data['left'] ?? null;
        $this->container['right'] = $data['right'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['top']) && ($this->container['top'] > 1)) {
            $invalidProperties[] = "invalid value for 'top', must be smaller than or equal to 1.";
        }

        if (!is_null($this->container['top']) && ($this->container['top'] < 0)) {
            $invalidProperties[] = "invalid value for 'top', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['bottom']) && ($this->container['bottom'] > 1)) {
            $invalidProperties[] = "invalid value for 'bottom', must be smaller than or equal to 1.";
        }

        if (!is_null($this->container['bottom']) && ($this->container['bottom'] < 0)) {
            $invalidProperties[] = "invalid value for 'bottom', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['left']) && ($this->container['left'] > 1)) {
            $invalidProperties[] = "invalid value for 'left', must be smaller than or equal to 1.";
        }

        if (!is_null($this->container['left']) && ($this->container['left'] < 0)) {
            $invalidProperties[] = "invalid value for 'left', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['right']) && ($this->container['right'] > 1)) {
            $invalidProperties[] = "invalid value for 'right', must be smaller than or equal to 1.";
        }

        if (!is_null($this->container['right']) && ($this->container['right'] < 0)) {
            $invalidProperties[] = "invalid value for 'right', must be bigger than or equal to 0.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets top
     *
     * @return float|null
     */
    public function getTop()
    {
        return $this->container['top'];
    }

    /**
     * Sets top
     *
     * @param float|null $top Crop from the top of the asset
     *
     * @return self
     */
    public function setTop($top)
    {

        if (!is_null($top) && ($top > 1)) {
            throw new \InvalidArgumentException('invalid value for $top when calling Crop., must be smaller than or equal to 1.');
        }
        if (!is_null($top) && ($top < 0)) {
            throw new \InvalidArgumentException('invalid value for $top when calling Crop., must be bigger than or equal to 0.');
        }

        $this->container['top'] = $top;

        return $this;
    }

    /**
     * Gets bottom
     *
     * @return float|null
     */
    public function getBottom()
    {
        return $this->container['bottom'];
    }

    /**
     * Sets bottom
     *
     * @param float|null $bottom Crop from the bottom of the asset
     *
     * @return self
     */
    public function setBottom($bottom)
    {

        if (!is_null($bottom) && ($bottom > 1)) {
            throw new \InvalidArgumentException('invalid value for $bottom when calling Crop., must be smaller than or equal to 1.');
        }
        if (!is_null($bottom) && ($bottom < 0)) {
            throw new \InvalidArgumentException('invalid value for $bottom when calling Crop., must be bigger than or equal to 0.');
        }

        $this->container['bottom'] = $bottom;

        return $this;
    }

    /**
     * Gets left
     *
     * @return float|null
     */
    public function getLeft()
    {
        return $this->container['left'];
    }

    /**
     * Sets left
     *
     * @param float|null $left Crop from the left of the asset
     *
     * @return self
     */
    public function setLeft($left)
    {

        if (!is_null($left) && ($left > 1)) {
            throw new \InvalidArgumentException('invalid value for $left when calling Crop., must be smaller than or equal to 1.');
        }
        if (!is_null($left) && ($left < 0)) {
            throw new \InvalidArgumentException('invalid value for $left when calling Crop., must be bigger than or equal to 0.');
        }

        $this->container['left'] = $left;

        return $this;
    }

    /**
     * Gets right
     *
     * @return float|null
     */
    public function getRight()
    {
        return $this->container['right'];
    }

    /**
     * Sets right
     *
     * @param float|null $right Crop from the left of the asset
     *
     * @return self
     */
    public function setRight($right)
    {

        if (!is_null($right) && ($right > 1)) {
            throw new \InvalidArgumentException('invalid value for $right when calling Crop., must be smaller than or equal to 1.');
        }
        if (!is_null($right) && ($right < 0)) {
            throw new \InvalidArgumentException('invalid value for $right when calling Crop., must be bigger than or equal to 0.');
        }

        $this->container['right'] = $right;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


