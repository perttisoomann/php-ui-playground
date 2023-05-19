<?php if ($profileImageURL !== ''): ?>
    <div style="width: 48px; height: 48px; border-radius: 50%; overflow: hidden;">
        <img src="<?= $profileImageURL ?>" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
<?php else: ?>
    <div style="width: 48px; height: 48px; border-radius: 50%; overflow: hidden; background: #aaa; position: relative;">
        <div style="position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px; /* set the font size for the initials */
        font-weight: bold;
        color: #fff;">
            <?= strtoupper($firstName[0] . $lastName[0]) ?>
        </div>
    </div>
<?php endif ?>
