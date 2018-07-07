<div class="contacts">
    <ul>
        <?php
        echo '<li><a title="' . __('footer.tel') . '" href="tel: ' . $data['tel1'] . '">' . $data['tel1'] . '</a></li>';
        echo $data['tel2'] ? '<li><a title="' . __('footer.tel') . '" href="tel: ' . $data['tel2'] . '">' . $data['tel2'] . '</a></li>' : '';
        echo $data['tel3'] ? '<li><a title="' . __('footer.tel') . '" href="tel: ' . $data['tel3'] . '">' . $data['tel3'] . '</a></li>' : '';
        ?>
        <li><a title="<?=__('footer.mail')?>" href="mailto:<?=$data['email']?>"><?=$data['email']?></a></li>
        <li>&copy К A L E I D O S C O P E - <?=date('Y')?></li>
    </ul>
</div>
<div class="social">
    <ul>
        <?php
        echo $data['fb'] ? '<li><a href="https://www.facebook.com/' . $data['fb'] . '"><i class="fab fa-facebook-square fa-2x"></i></a></li>' : '';
        echo $data['instagram'] ? '<li><a href="https://www.instagram.com/' . $data['instagram'] . '"><i class="fab fa-instagram fa-2x"></i></a></li>' : '';
        echo $data['telegram'] ? '<li><a href="https://telegram.me/' . $data['telegram'] . '"><i class="fab fa-telegram-plane fa-2x"></i></a></li>' : '';
        ?>
    </ul>
</div>
