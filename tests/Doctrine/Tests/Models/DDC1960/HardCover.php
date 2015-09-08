<?php

namespace Doctrine\Tests\Models\DDC1960;

/**
 * @Entity
 */
class HardCover
{
    /**
     * @Id
     * @Column()
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @OneToOne(targetEntity="Doctrine\Tests\Models\DDC1960\Book", inversedBy="hardCover")
     * @JoinColumns({
     *     @JoinColumn(name="id_book", referencedColumnName="id")
     * })
     */
    public $book;
}