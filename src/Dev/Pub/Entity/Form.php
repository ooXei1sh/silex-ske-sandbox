<?php

namespace Dev\Pub\Entity;

/**
 * Form
 *
 * @Table(name="form")
 * @Entity()
 */
class Form
{
    /**
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Column(name="text1", type="string", length=255, nullable=true)
     */
    private $text1;

    /**
     * @Column(name="text2", type="string", length=255, nullable=true)
     */
    private $text2;

    /**
     * @Column(name="text3", type="string", length=255, nullable=true)
     */
    private $text3;

    /**
     * @Column(name="text4", type="string", length=255, nullable=true)
     */
    private $text4;

    /**
     * @Column(name="text5", type="string", length=255, nullable=true)
     */
    private $text5;

    /**
     * @Column(name="text6", type="string", length=255, nullable=true)
     */
    private $text6;

    /**
     * @Column(name="text7", type="string", length=255, nullable=true)
     */
    private $text7;

    /**
     * @Column(name="text8", type="string", length=255, nullable=true)
     */
    private $text8;

    /**
     * @Column(name="textarea", type="string", length=255, nullable=true)
     */
    private $textarea;

    /**
     * @Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @Column(name="integerField", type="string", length=255, nullable=true)
     */
    private $integer;

    /**
     * @Column(name="money", type="string", length=255, nullable=true)
     */
    private $money;

    /**
     * @Column(name="number", type="string", length=255, nullable=true)
     */
    private $number;

    /**
     * @Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @Column(name="percent", type="string", length=255, nullable=true)
     */
    private $percent;

    /**
     * @Column(name="search", type="string", length=255, nullable=true)
     */
    private $search;

    /**
     * @Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @Column(name="choices1", type="array", nullable=true)
     */
    private $choices1;

    /**
     * @Column(name="choice2", type="string", length=255, nullable=true)
     */
    private $choice2;

    /**
     * @Column(name="choices3", type="array", nullable=true)
     */
    private $choices3;

    /**
     * @Column(name="choice4", type="string", length=255, nullable=true)
     */
    private $choice4;

    /**
     * @Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @Column(name="language", type="string", length=255, nullable=true)
     */
    private $language;

    /**
     * @Column(name="locale", type="string", length=255, nullable=true)
     */
    private $locale;

    /**
     * @Column(name="timezone", type="string", length=255, nullable=true)
     */
    private $timezone;

    /**
     * @Column(name="date", type="date")
     */
    private $date;

    /**
     * @Column(name="dateTime", type="datetime")
     */
    private $dateTime;

    /**
     * @Column(name="time", type="time")
     */
    private $time;

    /**
     * @Column(name="birthday", type="datetime")
     */
    private $birthday;

    /**
     * @Column(name="checkbox", type="boolean", nullable=true)
     */
    private $checkbox;

    /**
     * @Column(name="file", type="file", nullable=true)
     */
    // private $file;

    /**
     * @Column(name="radio", type="boolean", nullable=true)
     */
    private $radio;

    /**
     * @Column(name="passwordRepeated", type="string", length=255, nullable=true)
     */
    private $passwordRepeated;

    /**
     * __construct
     */
    public function __construct()
    {
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text1
     *
     * @param string $text1
     * @return Form
     */
    public function setText1($text1)
    {
        $this->text1 = $text1;

        return $this;
    }

    /**
     * Get text1
     *
     * @return string
     */
    public function getText1()
    {
        return $this->text1;
    }

    /**
     * Set text2
     *
     * @param string $text2
     * @return Form
     */
    public function setText2($text2)
    {
        $this->text2 = $text2;

        return $this;
    }

    /**
     * Get text2
     *
     * @return string
     */
    public function getText2()
    {
        return $this->text2;
    }

    /**
     * Set text3
     *
     * @param string $text3
     * @return Form
     */
    public function setText3($text3)
    {
        $this->text3 = $text3;

        return $this;
    }

    /**
     * Get text3
     *
     * @return string
     */
    public function getText3()
    {
        return $this->text3;
    }

    /**
     * Set text4
     *
     * @param string $text4
     * @return Form
     */
    public function setText4($text4)
    {
        $this->text4 = $text4;

        return $this;
    }

    /**
     * Get text4
     *
     * @return string
     */
    public function getText4()
    {
        return $this->text4;
    }

    /**
     * Set text5
     *
     * @param string $text5
     * @return Form
     */
    public function setText5($text5)
    {
        $this->text5 = $text5;

        return $this;
    }

    /**
     * Get text5
     *
     * @return string
     */
    public function getText5()
    {
        return $this->text5;
    }

    /**
     * Set text6
     *
     * @param string $text6
     * @return Form
     */
    public function setText6($text6)
    {
        $this->text6 = $text6;

        return $this;
    }

    /**
     * Get text6
     *
     * @return string
     */
    public function getText6()
    {
        return $this->text6;
    }

    /**
     * Set text7
     *
     * @param string $text7
     * @return Form
     */
    public function setText7($text7)
    {
        $this->text7 = $text7;

        return $this;
    }

    /**
     * Get text7
     *
     * @return string
     */
    public function getText7()
    {
        return $this->text7;
    }

    /**
     * Set text8
     *
     * @param string $text8
     * @return Form
     */
    public function setText8($text8)
    {
        $this->text8 = $text8;

        return $this;
    }

    /**
     * Get text8
     *
     * @return string
     */
    public function getText8()
    {
        return $this->text8;
    }

    /**
     * Set textarea
     *
     * @param string $textarea
     * @return Form
     */
    public function setTextarea($textarea)
    {
        $this->textarea = $textarea;

        return $this;
    }

    /**
     * Get textarea
     *
     * @return string
     */
    public function getTextarea()
    {
        return $this->textarea;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Form
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set integer
     *
     * @param string $integer
     * @return Form
     */
    public function setInteger($integer)
    {
        $this->integer = $integer;

        return $this;
    }

    /**
     * Get integer
     *
     * @return string
     */
    public function getInteger()
    {
        return $this->integer;
    }

    /**
     * Set money
     *
     * @param string $money
     * @return Form
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return string
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set number
     *
     * @param string $number
     * @return Form
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Form
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set percent
     *
     * @param string $percent
     * @return Form
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * Get percent
     *
     * @return string
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * Set search
     *
     * @param string $search
     * @return Form
     */
    public function setSearch($search)
    {
        $this->search = $search;

        return $this;
    }

    /**
     * Get search
     *
     * @return string
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Form
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set choices1
     *
     * @param array $choices1
     * @return Form
     */
    public function setChoices1($choices1)
    {
        $this->choices1 = $choices1;

        return $this;
    }

    /**
     * Get choices1
     *
     * @return array
     */
    public function getChoices1()
    {
        return $this->choices1;
    }

    /**
     * Set choice2
     *
     * @param string $choice2
     * @return Form
     */
    public function setChoice2($choice2)
    {
        $this->choice2 = $choice2;

        return $this;
    }

    /**
     * Get choice2
     *
     * @return string
     */
    public function getChoice2()
    {
        return $this->choice2;
    }

    /**
     * Set choices3
     *
     * @param array $choices3
     * @return Form
     */
    public function setChoices3($choices3)
    {
        $this->choices3 = $choices3;

        return $this;
    }

    /**
     * Get choices3
     *
     * @return array
     */
    public function getChoices3()
    {
        return $this->choices3;
    }

    /**
     * Set choice4
     *
     * @param string $choice4
     * @return Form
     */
    public function setChoice4($choice4)
    {
        $this->choice4 = $choice4;

        return $this;
    }

    /**
     * Get choice4
     *
     * @return string
     */
    public function getChoice4()
    {
        return $this->choice4;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Form
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Form
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return Form
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     * @return Form
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Form
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set dateTime
     *
     * @param \DateTime $dateTime
     * @return Form
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Form
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Form
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set checkbox
     *
     * @param boolean $checkbox
     * @return Form
     */
    public function setCheckbox($checkbox)
    {
        $this->checkbox = $checkbox;

        return $this;
    }

    /**
     * Get checkbox
     *
     * @return boolean
     */
    public function getCheckbox()
    {
        return $this->checkbox;
    }

    /**
     * Set radio
     *
     * @param boolean $radio
     * @return Form
     */
    public function setRadio($radio)
    {
        $this->radio = $radio;

        return $this;
    }

    /**
     * Get radio
     *
     * @return boolean
     */
    public function getRadio()
    {
        return $this->radio;
    }

    /**
     * Set passwordRepeated
     *
     * @param string $passwordRepeated
     * @return Form
     */
    public function setPasswordRepeated($passwordRepeated)
    {
        $this->passwordRepeated = $passwordRepeated;

        return $this;
    }

    /**
     * Get passwordRepeated
     *
     * @return string
     */
    public function getPasswordRepeated()
    {
        return $this->passwordRepeated;
    }
}
