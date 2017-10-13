<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 10/11/2017
 * Time: 12:19 PM
 */

namespace App\Services\Form;

use Simplon\Form\FormFields;
use Simplon\Form\Data\FormField;
use Simplon\Form\View\Elements\InputTextElement;
use Simplon\Form\View\FormViewBlock;
use Simplon\Form\View\FormViewRow;
use Simplon\Form\View\FormView;
use Simplon\Form\Data\Rules\RequiredRule;


class Form
{
    /**
     * @var FormFields
     */
    protected $fields;

    function __construct()
    {
        $this->fields = new FormFields();
    }

    /**
     * @param $id
     * @return array
     */
    public function createForm(string $id = null){

        $this->fields->add(
            (new FormField('songName'))
            ->addRule(new RequiredRule())
        );

        $this->fields->add(
            new FormField('artistName')
        );

        $songNameElement = (new InputTextElement($this->fields->get('songName')))
            ->setLabel('Song name:')
            ->setPlaceholder('Enter song name ...')
            ->setDescription('Please enter song name');

        $artistNameElement = (new InputTextElement($this->fields->get('artistName')))
            ->setLabel('Artist Name')
            ->setPlaceholder('Enter artist name ...')
            ->setDescription('Please enter artist name');

        $block = (new FormViewBlock('default'))
        ->addRow(
            (new FormViewRow())
                ->eightColumns($songNameElement)
        )
            ->addRow(
                (new FormViewRow())
                ->eightColumns($artistNameElement)
        );

        $formView = (new FormView())->addBlock($block);

        $templateVariables = [
            'id' => $id,
            'formView' => $formView
        ];

        return $templateVariables;
    }
}