<?php
class subcriberModel
{
    public $ID;
    public $UserID;
    public $SubcriberID;
    public $UserName;
    public $SubcriberName;
    public $UserPicture;
    public $SubcriberPicture;
    public $isLink;

    /**
     * Get the value of ID
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set the value of ID
     */
    public function setID($ID): self
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Get the value of UserID
     */
    public function getUserID()
    {
        return $this->UserID;
    }

    /**
     * Set the value of UserID
     */
    public function setUserID($UserID): self
    {
        $this->UserID = $UserID;

        return $this;
    }

    /**
     * Get the value of SubcriberID
     */
    public function getSubcriberID()
    {
        return $this->SubcriberID;
    }

    /**
     * Set the value of SubcriberID
     */
    public function setSubcriberID($SubcriberID): self
    {
        $this->SubcriberID = $SubcriberID;

        return $this;
    }

    /**
     * Get the value of SubcriberName
     */
    public function getSubcriberName()
    {
        return $this->SubcriberName;
    }

    /**
     * Set the value of SubcriberName
     */
    public function setSubcriberName($SubcriberName): self
    {
        $this->SubcriberName = $SubcriberName;

        return $this;
    }

    /**
     * Get the value of SubcriberPicture
     */
    public function getSubcriberPicture()
    {
        return $this->SubcriberPicture;
    }

    /**
     * Set the value of SubcriberPicture
     */
    public function setSubcriberPicture($SubcriberPicture): self
    {
        $this->SubcriberPicture = $SubcriberPicture;

        return $this;
    }

    /**
     * Get the value of isLink
     */
    public function getIsLink()
    {
        return $this->isLink;
    }

    /**
     * Set the value of isLink
     */
    public function setIsLink($isLink): self
    {
        $this->isLink = $isLink;

        return $this;
    }

    /**
     * Get the value of UserName
     */
    public function getUserName()
    {
        return $this->UserName;
    }

    /**
     * Set the value of UserName
     */
    public function setUserName($UserName): self
    {
        $this->UserName = $UserName;

        return $this;
    }

    /**
     * Get the value of UserPicture
     */
    public function getUserPicture()
    {
        return $this->UserPicture;
    }

    /**
     * Set the value of UserPicture
     */
    public function setUserPicture($UserPicture): self
    {
        $this->UserPicture = $UserPicture;

        return $this;
    }
}
