<?php

namespace Application\MyComponents;

class MyUserDataTable extends MyTable
{
    public function __construct()
    {
        parent::__construct();

        $nameColumn = new MyTableColumn('Name');
        $nameColumn->setValue(function (array $data) { return $data['firstname'] . ' ' . $data['lastname']; });

        $emailColumn = (new MyTableColumn('Email'))
            ->setValue(
                function (array $data) {
                    return sprintf('<a href="%1$s">%1$s</a>', $data['email']);
                }
            );

        $avatarColumn = (new MyTableColumn())
            ->setValue(
                function (array $data) {
                    return $this->renderer->render(
                        new MyAvatar($data['firstname'], $data['lastname'], $data['avatarUrl'] ?? '')
                    );
                }
            );

        $this->addColumn(
            $avatarColumn,
            $nameColumn,
            $emailColumn,
            (new MyTableColumn('City'))->setValue('city')
        );

        $this->setData(
            [
                [
                    'firstname' => 'John',
                    'lastname' => 'Doe',
                    'email' => 'john.doe@example.com',
                    'city' => 'New York',
                    'avatarUrl' => 'https://pyxis.nymag.com/v1/imgs/87d/885/a96eb734ee3e4f154b3bd22cb0c28d856e-29-lemmy-1.2x.rhorizontal.w710.jpg',
                ],
                [
                    'firstname' => 'Jane',
                    'lastname' => 'Doe',
                    'email' => 'jane.doe@example.com',
                    'city' => 'Los Angeles',
                    'avatarUrl' => 'https://nationaltoday.com/wp-content/uploads/2022/10/24-Lemmy-Kilmister.jpg',
                ],
                [
                    'firstname' => 'Jim',
                    'lastname' => 'Smith',
                    'email' => 'jim.smith@example.com',
                    'city' => 'Chicago'
                ],
                [
                    'firstname' => 'Amy',
                    'lastname' => 'Johnson',
                    'email' => 'amy.johnson@example.com',
                    'city' => 'Miami'
                ],
                [
                    'firstname' => 'Bob',
                    'lastname' => 'Brown',
                    'email' => 'bob.brown@example.com',
                    'city' => 'San Francisco',
                    'avatarUrl' => 'https://wp-cpr.s3.amazonaws.com/uploads/2019/07/461328241_610450533.jpg',
                ]
            ]
        );
    }
}
