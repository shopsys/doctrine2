<?php

namespace Doctrine\Tests\Models\DDC1960;

/**
 * @Entity
 */
class Book
{
    /**
     * @Id
     * @Column()
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @OneToOne(targetEntity="Doctrine\Tests\Models\DDC1960\HardCover", mappedBy="book", cascade={"persist"})
     */
    public $hardCover;
}

