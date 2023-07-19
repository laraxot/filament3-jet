<?php

namespace ArtMin96\FilamentJet\Contracts;

/**
 * @mixin \Eloquent
 */
interface ModelContract
{
    /**
     * Duplicate the instance and unset all the loaded relations.
     *
     * @return $this
     */
    public function withoutRelations();



    /**
     * Fill the model with an array of attributes. Force mass assignment.
     *
     * @return $this
     */
    public function forceFill(array $attributes);

    /**
     * Save the model to the database.
     *
     * @return bool
     */
    public function save(array $options = []);

    /*
     * Save a new model and return the instance. Allow mass-assignment.
     *
     * @return \Illuminate\Database\Eloquent\Model|$this

    public function forceCreate(array $attributes);
    */
    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray();

    /**
     * Get the value of the model's primary key.
     *
     * @return mixed
     */
    public function getKey();
}
