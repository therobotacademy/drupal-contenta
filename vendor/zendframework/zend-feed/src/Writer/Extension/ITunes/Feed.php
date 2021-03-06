<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Feed\Writer\Extension\ITunes;

use Zend\Feed\Uri;
use Zend\Feed\Writer;
use Zend\Stdlib\StringUtils;
use Zend\Stdlib\StringWrapper\StringWrapperInterface;

class Feed
{
    /**
     * Array of Feed data for rendering by Extension's renderers
     *
     * @var array
     */
    protected $data = [];

    /**
     * Encoding of all text values
     *
     * @var string
     */
    protected $encoding = 'UTF-8';

    /**
     * The used string wrapper supporting encoding
     *
     * @var StringWrapperInterface
     */
    protected $stringWrapper;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stringWrapper = StringUtils::getWrapper($this->encoding);
    }

    /**
     * Set feed encoding
     *
     * @param  string $enc
     * @return Feed
     */
    public function setEncoding($enc)
    {
        $this->stringWrapper = StringUtils::getWrapper($enc);
        $this->encoding      = $enc;
        return $this;
    }

    /**
     * Get feed encoding
     *
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Set a block value of "yes" or "no". You may also set an empty string.
     *
     * @param  string
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesBlock($value)
    {
<<<<<<< HEAD
        if (! ctype_alpha($value) && strlen($value) > 0) {
=======
        if (!ctype_alpha($value) && strlen($value) > 0) {
>>>>>>> pantheon-drops-8/master
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "block" may only'
            . ' contain alphabetic characters');
        }
        if ($this->stringWrapper->strlen($value) > 255) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "block" may only'
            . ' contain a maximum of 255 characters');
        }
        $this->data['block'] = $value;
        return $this;
    }

    /**
     * Add feed authors
     *
     * @param  array $values
     * @return Feed
     */
    public function addItunesAuthors(array $values)
    {
        foreach ($values as $value) {
            $this->addItunesAuthor($value);
        }
        return $this;
    }

    /**
     * Add feed author
     *
     * @param  string $value
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function addItunesAuthor($value)
    {
        if ($this->stringWrapper->strlen($value) > 255) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: any "author" may only'
            . ' contain a maximum of 255 characters each');
        }
<<<<<<< HEAD
        if (! isset($this->data['authors'])) {
=======
        if (!isset($this->data['authors'])) {
>>>>>>> pantheon-drops-8/master
            $this->data['authors'] = [];
        }
        $this->data['authors'][] = $value;
        return $this;
    }

    /**
     * Set feed categories
     *
     * @param  array $values
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesCategories(array $values)
    {
<<<<<<< HEAD
        if (! isset($this->data['categories'])) {
            $this->data['categories'] = [];
        }
        foreach ($values as $key => $value) {
            if (! is_array($value)) {
=======
        if (!isset($this->data['categories'])) {
            $this->data['categories'] = [];
        }
        foreach ($values as $key => $value) {
            if (!is_array($value)) {
>>>>>>> pantheon-drops-8/master
                if ($this->stringWrapper->strlen($value) > 255) {
                    throw new Writer\Exception\InvalidArgumentException('invalid parameter: any "category" may only'
                    . ' contain a maximum of 255 characters each');
                }
                $this->data['categories'][] = $value;
            } else {
                if ($this->stringWrapper->strlen($key) > 255) {
                    throw new Writer\Exception\InvalidArgumentException('invalid parameter: any "category" may only'
                    . ' contain a maximum of 255 characters each');
                }
                $this->data['categories'][$key] = [];
                foreach ($value as $val) {
                    if ($this->stringWrapper->strlen($val) > 255) {
                        throw new Writer\Exception\InvalidArgumentException('invalid parameter: any "category" may only'
                        . ' contain a maximum of 255 characters each');
                    }
                    $this->data['categories'][$key][] = $val;
                }
            }
        }
        return $this;
    }

    /**
     * Set feed image (icon)
     *
     * @param  string $value
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesImage($value)
    {
<<<<<<< HEAD
        if (! is_string($value) || ! Uri::factory($value)->isValid()) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "image" may only'
            . ' be a valid URI/IRI');
        }
        if (! in_array(substr($value, -3), ['jpg', 'png'])) {
=======
        if (!Uri::factory($value)->isValid()) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "image" may only'
            . ' be a valid URI/IRI');
        }
        if (!in_array(substr($value, -3), ['jpg', 'png'])) {
>>>>>>> pantheon-drops-8/master
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "image" may only'
            . ' use file extension "jpg" or "png" which must be the last three'
            . ' characters of the URI (i.e. no query string or fragment)');
        }
        $this->data['image'] = $value;
        return $this;
    }

    /**
     * Set feed cumulative duration
     *
     * @param  string $value
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesDuration($value)
    {
        $value = (string) $value;
<<<<<<< HEAD
        if (! ctype_digit($value)
            && ! preg_match("/^\d+:[0-5]{1}[0-9]{1}$/", $value)
            && ! preg_match("/^\d+:[0-5]{1}[0-9]{1}:[0-5]{1}[0-9]{1}$/", $value)
=======
        if (!ctype_digit($value)
            && !preg_match("/^\d+:[0-5]{1}[0-9]{1}$/", $value)
            && !preg_match("/^\d+:[0-5]{1}[0-9]{1}:[0-5]{1}[0-9]{1}$/", $value)
>>>>>>> pantheon-drops-8/master
        ) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "duration" may only'
            . ' be of a specified [[HH:]MM:]SS format');
        }
        $this->data['duration'] = $value;
        return $this;
    }

    /**
     * Set "explicit" flag
     *
     * @param  bool $value
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesExplicit($value)
    {
<<<<<<< HEAD
        if (! in_array($value, ['yes', 'no', 'clean'])) {
=======
        if (!in_array($value, ['yes', 'no', 'clean'])) {
>>>>>>> pantheon-drops-8/master
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "explicit" may only'
            . ' be one of "yes", "no" or "clean"');
        }
        $this->data['explicit'] = $value;
        return $this;
    }

    /**
     * Set feed keywords
     *
<<<<<<< HEAD
     * @deprecated since 2.10.0; itunes:keywords is no longer part of the
     *     iTunes podcast RSS specification.
=======
>>>>>>> pantheon-drops-8/master
     * @param  array $value
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesKeywords(array $value)
    {
<<<<<<< HEAD
        trigger_error(
            'itunes:keywords has been deprecated in the iTunes podcast RSS specification,'
            . ' and should not be relied on.',
            \E_USER_DEPRECATED
        );

=======
>>>>>>> pantheon-drops-8/master
        if (count($value) > 12) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "keywords" may only'
            . ' contain a maximum of 12 terms');
        }
        $concat = implode(',', $value);
        if ($this->stringWrapper->strlen($concat) > 255) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "keywords" may only'
            . ' have a concatenated length of 255 chars where terms are delimited'
            . ' by a comma');
        }
        $this->data['keywords'] = $value;
        return $this;
    }

    /**
     * Set new feed URL
     *
     * @param  string $value
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesNewFeedUrl($value)
    {
<<<<<<< HEAD
        if (! Uri::factory($value)->isValid()) {
=======
        if (!Uri::factory($value)->isValid()) {
>>>>>>> pantheon-drops-8/master
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "newFeedUrl" may only'
            . ' be a valid URI/IRI');
        }
        $this->data['newFeedUrl'] = $value;
        return $this;
    }

    /**
     * Add feed owners
     *
     * @param  array $values
     * @return Feed
     */
    public function addItunesOwners(array $values)
    {
        foreach ($values as $value) {
            $this->addItunesOwner($value);
        }
        return $this;
    }

    /**
     * Add feed owner
     *
     * @param  array $value
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function addItunesOwner(array $value)
    {
<<<<<<< HEAD
        if (! isset($value['name']) || ! isset($value['email'])) {
=======
        if (!isset($value['name']) || !isset($value['email'])) {
>>>>>>> pantheon-drops-8/master
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: any "owner" must'
            . ' be an array containing keys "name" and "email"');
        }
        if ($this->stringWrapper->strlen($value['name']) > 255
            || $this->stringWrapper->strlen($value['email']) > 255
        ) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: any "owner" may only'
            . ' contain a maximum of 255 characters each for "name" and "email"');
        }
<<<<<<< HEAD
        if (! isset($this->data['owners'])) {
=======
        if (!isset($this->data['owners'])) {
>>>>>>> pantheon-drops-8/master
            $this->data['owners'] = [];
        }
        $this->data['owners'][] = $value;
        return $this;
    }

    /**
     * Set feed subtitle
     *
     * @param  string $value
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesSubtitle($value)
    {
        if ($this->stringWrapper->strlen($value) > 255) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "subtitle" may only'
            . ' contain a maximum of 255 characters');
        }
        $this->data['subtitle'] = $value;
        return $this;
    }

    /**
     * Set feed summary
     *
     * @param  string $value
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesSummary($value)
    {
        if ($this->stringWrapper->strlen($value) > 4000) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "summary" may only'
            . ' contain a maximum of 4000 characters');
        }
        $this->data['summary'] = $value;
        return $this;
    }

    /**
<<<<<<< HEAD
     * Set podcast type
     *
     * @param  string $type
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesType($type)
    {
        $validTypes = ['episodic', 'serial'];
        if (! in_array($type, $validTypes, true)) {
            throw new Writer\Exception\InvalidArgumentException(sprintf(
                'invalid parameter: "type" MUST be one of [%s]; received %s',
                implode(', ', $validTypes),
                is_object($type) ? get_class($type) : var_export($type, true)
            ));
        }
        $this->data['type'] = $type;
        return $this;
    }

    /**
     * Set "completion" status (whether more episodes will be released)
     *
     * @param  bool $status
     * @return Feed
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesComplete($status)
    {
        if (! is_bool($status)) {
            throw new Writer\Exception\InvalidArgumentException(sprintf(
                'invalid parameter: "complete" MUST be boolean; received %s',
                is_object($status) ? get_class($status) : var_export($status, true)
            ));
        }

        if (! $status) {
            return $this;
        }

        $this->data['complete'] = 'Yes';
        return $this;
    }

    /**
=======
>>>>>>> pantheon-drops-8/master
     * Overloading: proxy to internal setters
     *
     * @param  string $method
     * @param  array $params
     * @return mixed
     * @throws Writer\Exception\BadMethodCallException
     */
    public function __call($method, array $params)
    {
        $point = lcfirst(substr($method, 9));
<<<<<<< HEAD
        if (! method_exists($this, 'setItunes' . ucfirst($point))
            && ! method_exists($this, 'addItunes' . ucfirst($point))
=======
        if (!method_exists($this, 'setItunes' . ucfirst($point))
            && !method_exists($this, 'addItunes' . ucfirst($point))
>>>>>>> pantheon-drops-8/master
        ) {
            throw new Writer\Exception\BadMethodCallException(
                'invalid method: ' . $method
            );
        }
<<<<<<< HEAD

        if (! array_key_exists($point, $this->data) || empty($this->data[$point])) {
=======
        if (!array_key_exists($point, $this->data) || empty($this->data[$point])) {
>>>>>>> pantheon-drops-8/master
            return;
        }
        return $this->data[$point];
    }
}
