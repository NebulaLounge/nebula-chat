<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$api_key = get_option('privacybee_api_key');
$url = PRIVACYBEE_PLUGIN_URL . "assets/image/pr.png";
$icon = PRIVACYBEE_PLUGIN_URL . "assets/image/right-symbol.png";
$tootip = PRIVACYBEE_PLUGIN_URL . "assets/image/tooltip.png";
$api_key = get_option('privacybee_api_key');
if( empty( $api_key ) ){
    ?>
    <div class="container privacybee_content">        
        <div class="logo">
            <svg width="56" height="56" viewBox="0 0 443 364" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M179.757 168.519C182.025 152.76 193.889 147.346 193.889 147.346C190.728 137.594 193.554 127.359 197.979 122.539C205.343 114.529 221.26 107.187 221.26 107.187C221.26 107.187 237.177 114.529 244.54 122.539C248.966 127.359 251.792 137.594 248.631 147.346C248.631 147.346 260.494 152.76 262.763 168.519C288.386 149.905 307.464 125.023 319.774 94.0976H122.746C135.092 125.023 154.133 149.905 179.757 168.519Z" fill="#FBC001"></path><path d="M221.26 209.308C216.723 207.417 207.277 203.412 195.785 197.554L190.095 213.721C205.417 221.434 216.76 225.772 218.285 226.328L221.26 227.404L224.235 226.328C225.76 225.772 237.102 221.434 252.424 213.721L246.734 197.554C235.243 203.449 225.834 207.417 221.26 209.308Z" fill="#FBC001"></path><path d="M179.831 69.105C179.831 46.3373 198.426 27.7968 221.26 27.7968C244.094 27.7968 262.651 46.3373 262.651 69.105V81.898H280.205V71.8861C280.205 39.4402 253.763 13.0757 221.26 13.0757C188.756 13.0757 162.315 39.4402 162.315 71.8861V81.898H179.831V69.105Z" fill="#FBC001"></path><path d="M118.543 114.307V166.109C139.444 170.151 160.939 175.12 172.059 177.789C149.447 161.14 131.448 139.744 118.543 114.307Z" fill="#FBC001"></path><path d="M270.498 177.789C281.581 175.12 303.113 170.151 323.976 166.109V114.307C311.072 139.744 293.072 161.14 270.498 177.789Z" fill="#FBC001"></path><path d="M262.726 263.521C244.317 274.163 227.805 281.282 221.26 283.952C214.715 281.282 198.203 274.163 179.794 263.521C179.757 262.631 179.719 261.778 179.719 260.925C179.719 256.067 180.203 251.099 180.984 246.352C200.769 256.957 216.5 263.002 218.285 263.632L221.26 264.744L224.235 263.632C226.02 263.002 241.751 256.957 261.536 246.352C262.317 251.099 262.8 256.067 262.8 260.925C262.8 261.741 262.763 262.631 262.726 263.521ZM221.26 324.593C199.653 316.398 188.571 300.787 183.476 284.991C202.07 294.817 216.574 300.342 218.285 300.972L221.26 302.085L224.235 300.972C225.946 300.342 240.449 294.817 259.044 284.991C253.949 300.787 242.867 316.398 221.26 324.593ZM253.391 216.354C253.391 216.354 255.437 221.471 257.631 229.072C241.342 238.083 227.21 244.201 221.26 246.612C215.347 244.201 201.178 238.12 184.889 229.072C187.083 221.471 189.166 216.354 189.166 216.354C189.166 216.354 158.336 238.306 134.088 246.501C129.812 247.91 125.46 248.911 121.109 249.504C134.163 284.434 161.98 327.448 221.26 350.735C280.577 327.448 308.357 284.434 321.41 249.504C317.059 248.911 312.708 247.91 308.431 246.501C284.184 238.306 253.391 216.354 253.391 216.354Z" fill="#FBC001"></path><path d="M323.976 166.109C303.113 170.151 281.581 175.12 270.498 177.789C293.072 161.14 311.072 139.744 323.976 114.307V166.109ZM221.26 350.735C161.98 327.448 134.163 284.434 121.109 249.504C125.46 248.911 129.812 247.91 134.088 246.463C158.336 238.306 189.166 216.354 189.166 216.354C189.166 216.354 187.083 221.471 184.889 229.072C201.178 238.083 215.347 244.201 221.26 246.612C227.21 244.201 241.342 238.083 257.631 229.072C255.437 221.471 253.354 216.354 253.354 216.354C253.354 216.354 284.184 238.306 308.431 246.463C312.708 247.91 317.059 248.911 321.41 249.504C308.357 284.434 280.577 327.448 221.26 350.735ZM118.543 114.307C131.448 139.744 149.447 161.14 172.059 177.789C160.939 175.12 139.444 170.151 118.543 166.109V114.307ZM252.424 213.721C237.102 221.434 225.76 225.772 224.235 226.328L221.26 227.404L218.285 226.328C216.76 225.772 205.417 221.434 190.058 213.721L195.785 197.554C207.277 203.412 216.723 207.417 221.26 209.308C225.834 207.417 235.243 203.449 246.734 197.554L252.424 213.721ZM319.774 94.0976C307.464 125.023 288.386 149.905 262.763 168.519C260.494 152.76 248.631 147.346 248.631 147.346C251.792 137.594 248.966 127.359 244.54 122.539C237.177 114.529 221.26 107.187 221.26 107.187C221.26 107.187 205.343 114.529 197.979 122.539C193.554 127.359 190.728 137.594 193.889 147.346C193.889 147.346 182.025 152.76 179.757 168.519C154.171 149.905 135.092 125.023 122.746 94.0976H319.774ZM250.453 69.1051V81.898H192.104V69.1051C192.104 53.049 205.157 39.9965 221.26 39.9965C237.363 39.9965 250.453 53.049 250.453 69.1051ZM162.315 71.8861C162.315 39.4403 188.756 13.0757 221.26 13.0757C253.763 13.0757 280.205 39.4403 280.205 71.8861V81.898H262.651V69.1051C262.651 46.3373 244.094 27.7968 221.26 27.7968C198.426 27.7968 179.831 46.3373 179.831 69.1051V81.898H162.315V71.8861ZM362.244 160.213C355.104 160.769 345.992 162.104 336.212 163.847V81.898H292.44V71.8861C292.44 32.7286 260.532 0.876038 221.26 0.876038C182.025 0.876038 150.08 32.7286 150.08 71.8861V81.898H106.308V163.847C96.5272 162.104 87.4159 160.769 80.2755 160.213C49.1482 157.692 7.94252 158.952 1.62035 172.746C-4.70181 186.541 6.00868 208.826 73.6559 222.324C73.6559 222.324 60.4537 232.373 71.4617 240.53C78.6392 245.833 92.7339 250.172 108.391 250.357C121.927 288.736 152.088 337.534 219.103 362.972L221.26 363.825L223.454 362.972C290.469 337.534 320.592 288.736 334.129 250.357C349.786 250.172 363.88 245.833 371.058 240.53C382.066 232.373 368.864 222.324 368.864 222.324C436.511 208.826 447.222 186.541 440.899 172.746C434.577 158.952 393.372 157.692 362.244 160.213Z" fill="#081450"></path><path d="M221.26 302.085L218.285 300.972C216.574 300.342 202.07 294.817 183.476 284.991C188.571 300.787 199.653 316.361 221.26 324.593C242.867 316.398 253.949 300.787 259.044 284.991C240.449 294.817 225.946 300.342 224.235 300.972L221.26 302.085Z" fill="#081450"></path><path d="M224.235 263.632L221.26 264.781L218.285 263.632C216.5 263.002 200.769 256.957 180.984 246.352C180.203 251.099 179.72 256.067 179.72 260.925C179.72 261.741 179.757 262.668 179.794 263.521C198.203 274.163 214.715 281.282 221.26 283.952C227.805 281.282 244.317 274.163 262.726 263.521C262.763 262.668 262.8 261.741 262.8 260.925C262.8 256.067 262.317 251.099 261.536 246.352C241.751 256.957 226.02 263.002 224.235 263.632Z" fill="#081450"></path></svg>
            <h1><?php esc_html_e( 'PrivacyBee', 'privacybee-privacy-policy' ); ?></h1>
        </div>
        <hr>
        <h2><?php esc_html_e( 'Welcome to PrivacyBee', 'privacybee-privacy-policy' ); ?></h>
        <p><?php esc_html_e( 'The simplest and most comprehensive privacy policy for Germany, Austria, and Switzerland. Designed to work with WordPress and keep you legally compliant.', 'privacybee-privacy-policy' ); ?></p>
        <p><?php esc_html_e( 'Please open an account or enter your website ID from the dashboard to integrate the privacy policy into your website.', 'privacybee-privacy-policy' ); ?></p>

        <div class="features-abc">
            <p><img src="<?php  printf(esc_url($icon)); ?>" alt="right-symbol"><?php esc_html_e( 'Compliant with EU GDPR and Swiss nDSG laws.', 'privacybee-privacy-policy' ); ?></p>
            <p><img src="<?php  printf(esc_url($icon)); ?>" alt="right-symbol"><?php esc_html_e( 'Once setup, forever compliant. Thanks to the automated scanning and our lawyers.', 'privacybee-privacy-policy' ); ?></p>
            <p><img src="<?php  printf(esc_url($icon)); ?>" alt="right-symbol"><?php esc_html_e( 'FREE trial without credit card.', 'privacybee-privacy-policy' ); ?></p>
        </div>
        <div class="get-api-btn">
        <button><a href="https://privacybee.io/signup?utm_source=wordpress"><?php esc_html_e( 'Sign up & get API key', 'privacybee-privacy-policy' ); ?></a></button>
        </div>

        <div class="api-key-input">
            <p><?php esc_html_e( 'Already have a PrivacyBee account? Enter your API key below.', 'privacybee-privacy-policy' ); ?></p>
            <form method="post" action="options.php">
                <?php settings_fields( 'privacybee_settings_group' ); ?>
                <?php do_settings_sections( 'privacybee_settings_group' ); ?>
                <div class="form-group">
                    <input type="text" placeholder="<?php esc_html_e( 'Enter your API key', 'privacybee-privacy-policy' ); ?>" name="privacybee_api_key" value="<?php printf(esc_attr( get_option('privacybee_api_key') )); ?>">
                    <div class="get-api-btn">
        <button><?php esc_html_e( 'Add API key', 'privacybee-privacy-policy' ); ?></button>
        </div>
                </div>
            </form>
        </div>

        <div class="error-message">
            <?php esc_html_e( 'Please provide an API key for an active subscription.', 'privacybee-privacy-policy' ); ?>
        </div>
        <div class="footer">
            <p><?php esc_html_e( 'Login to PrivacyBee dashboard to find your API key.', 'privacybee-privacy-policy' ); ?> <a href="https://privacybee.freshdesk.com/support/solutions/articles/
103000309613-wo-finde-ich-meinen-api-key"><?php esc_html_e( 'Learn more.', 'privacybee-privacy-policy' ); ?></a></p>
        </div>
        
    </div>
    <?php
}else{
    $lazy_load_check = get_option('privacybee_lazyload');
    if( empty( $lazy_load_check ) ){
        $lazy_load_check = "disabled";
    }
    
    ?>
    <div class="Privacybee-main">
        <div class="container">
            <div class="privacybee-sec">
                <div class="privacybee-st">
                    <div class="privacy-logo-img">
                        <svg width="56" height="56" viewBox="0 0 443 364" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M179.757 168.519C182.025 152.76 193.889 147.346 193.889 147.346C190.728 137.594 193.554 127.359 197.979 122.539C205.343 114.529 221.26 107.187 221.26 107.187C221.26 107.187 237.177 114.529 244.54 122.539C248.966 127.359 251.792 137.594 248.631 147.346C248.631 147.346 260.494 152.76 262.763 168.519C288.386 149.905 307.464 125.023 319.774 94.0976H122.746C135.092 125.023 154.133 149.905 179.757 168.519Z" fill="#FBC001"></path><path d="M221.26 209.308C216.723 207.417 207.277 203.412 195.785 197.554L190.095 213.721C205.417 221.434 216.76 225.772 218.285 226.328L221.26 227.404L224.235 226.328C225.76 225.772 237.102 221.434 252.424 213.721L246.734 197.554C235.243 203.449 225.834 207.417 221.26 209.308Z" fill="#FBC001"></path><path d="M179.831 69.105C179.831 46.3373 198.426 27.7968 221.26 27.7968C244.094 27.7968 262.651 46.3373 262.651 69.105V81.898H280.205V71.8861C280.205 39.4402 253.763 13.0757 221.26 13.0757C188.756 13.0757 162.315 39.4402 162.315 71.8861V81.898H179.831V69.105Z" fill="#FBC001"></path><path d="M118.543 114.307V166.109C139.444 170.151 160.939 175.12 172.059 177.789C149.447 161.14 131.448 139.744 118.543 114.307Z" fill="#FBC001"></path><path d="M270.498 177.789C281.581 175.12 303.113 170.151 323.976 166.109V114.307C311.072 139.744 293.072 161.14 270.498 177.789Z" fill="#FBC001"></path><path d="M262.726 263.521C244.317 274.163 227.805 281.282 221.26 283.952C214.715 281.282 198.203 274.163 179.794 263.521C179.757 262.631 179.719 261.778 179.719 260.925C179.719 256.067 180.203 251.099 180.984 246.352C200.769 256.957 216.5 263.002 218.285 263.632L221.26 264.744L224.235 263.632C226.02 263.002 241.751 256.957 261.536 246.352C262.317 251.099 262.8 256.067 262.8 260.925C262.8 261.741 262.763 262.631 262.726 263.521ZM221.26 324.593C199.653 316.398 188.571 300.787 183.476 284.991C202.07 294.817 216.574 300.342 218.285 300.972L221.26 302.085L224.235 300.972C225.946 300.342 240.449 294.817 259.044 284.991C253.949 300.787 242.867 316.398 221.26 324.593ZM253.391 216.354C253.391 216.354 255.437 221.471 257.631 229.072C241.342 238.083 227.21 244.201 221.26 246.612C215.347 244.201 201.178 238.12 184.889 229.072C187.083 221.471 189.166 216.354 189.166 216.354C189.166 216.354 158.336 238.306 134.088 246.501C129.812 247.91 125.46 248.911 121.109 249.504C134.163 284.434 161.98 327.448 221.26 350.735C280.577 327.448 308.357 284.434 321.41 249.504C317.059 248.911 312.708 247.91 308.431 246.501C284.184 238.306 253.391 216.354 253.391 216.354Z" fill="#FBC001"></path><path d="M323.976 166.109C303.113 170.151 281.581 175.12 270.498 177.789C293.072 161.14 311.072 139.744 323.976 114.307V166.109ZM221.26 350.735C161.98 327.448 134.163 284.434 121.109 249.504C125.46 248.911 129.812 247.91 134.088 246.463C158.336 238.306 189.166 216.354 189.166 216.354C189.166 216.354 187.083 221.471 184.889 229.072C201.178 238.083 215.347 244.201 221.26 246.612C227.21 244.201 241.342 238.083 257.631 229.072C255.437 221.471 253.354 216.354 253.354 216.354C253.354 216.354 284.184 238.306 308.431 246.463C312.708 247.91 317.059 248.911 321.41 249.504C308.357 284.434 280.577 327.448 221.26 350.735ZM118.543 114.307C131.448 139.744 149.447 161.14 172.059 177.789C160.939 175.12 139.444 170.151 118.543 166.109V114.307ZM252.424 213.721C237.102 221.434 225.76 225.772 224.235 226.328L221.26 227.404L218.285 226.328C216.76 225.772 205.417 221.434 190.058 213.721L195.785 197.554C207.277 203.412 216.723 207.417 221.26 209.308C225.834 207.417 235.243 203.449 246.734 197.554L252.424 213.721ZM319.774 94.0976C307.464 125.023 288.386 149.905 262.763 168.519C260.494 152.76 248.631 147.346 248.631 147.346C251.792 137.594 248.966 127.359 244.54 122.539C237.177 114.529 221.26 107.187 221.26 107.187C221.26 107.187 205.343 114.529 197.979 122.539C193.554 127.359 190.728 137.594 193.889 147.346C193.889 147.346 182.025 152.76 179.757 168.519C154.171 149.905 135.092 125.023 122.746 94.0976H319.774ZM250.453 69.1051V81.898H192.104V69.1051C192.104 53.049 205.157 39.9965 221.26 39.9965C237.363 39.9965 250.453 53.049 250.453 69.1051ZM162.315 71.8861C162.315 39.4403 188.756 13.0757 221.26 13.0757C253.763 13.0757 280.205 39.4403 280.205 71.8861V81.898H262.651V69.1051C262.651 46.3373 244.094 27.7968 221.26 27.7968C198.426 27.7968 179.831 46.3373 179.831 69.1051V81.898H162.315V71.8861ZM362.244 160.213C355.104 160.769 345.992 162.104 336.212 163.847V81.898H292.44V71.8861C292.44 32.7286 260.532 0.876038 221.26 0.876038C182.025 0.876038 150.08 32.7286 150.08 71.8861V81.898H106.308V163.847C96.5272 162.104 87.4159 160.769 80.2755 160.213C49.1482 157.692 7.94252 158.952 1.62035 172.746C-4.70181 186.541 6.00868 208.826 73.6559 222.324C73.6559 222.324 60.4537 232.373 71.4617 240.53C78.6392 245.833 92.7339 250.172 108.391 250.357C121.927 288.736 152.088 337.534 219.103 362.972L221.26 363.825L223.454 362.972C290.469 337.534 320.592 288.736 334.129 250.357C349.786 250.172 363.88 245.833 371.058 240.53C382.066 232.373 368.864 222.324 368.864 222.324C436.511 208.826 447.222 186.541 440.899 172.746C434.577 158.952 393.372 157.692 362.244 160.213Z" fill="#081450"></path><path d="M221.26 302.085L218.285 300.972C216.574 300.342 202.07 294.817 183.476 284.991C188.571 300.787 199.653 316.361 221.26 324.593C242.867 316.398 253.949 300.787 259.044 284.991C240.449 294.817 225.946 300.342 224.235 300.972L221.26 302.085Z" fill="#081450"></path><path d="M224.235 263.632L221.26 264.781L218.285 263.632C216.5 263.002 200.769 256.957 180.984 246.352C180.203 251.099 179.72 256.067 179.72 260.925C179.72 261.741 179.757 262.668 179.794 263.521C198.203 274.163 214.715 281.282 221.26 283.952C227.805 281.282 244.317 274.163 262.726 263.521C262.763 262.668 262.8 261.741 262.8 260.925C262.8 256.067 262.317 251.099 261.536 246.352C241.751 256.957 226.02 263.002 224.235 263.632Z" fill="#081450"></path></svg>
                    </div>
                    <h1><?php esc_html_e( 'PrivacyBee', 'privacybee-privacy-policy' ); ?></h1>
                    <div class="dashboard-btn">
                        <a href="https://app.privacybee.io" target="_blank" style="cursor: pointer;">
                            <button><?php esc_html_e( 'To the dashboard', 'privacybee-privacy-policy' ); ?></button>
                        </a>    
                    </div>
                </div>

                <div class="PrivacyBee-section">
                    <h2><?php esc_html_e( 'PrivacyBee - Privacy Policy', 'privacybee-privacy-policy' ); ?></h2>
                    <p><?php esc_html_e( 'You have successfully connected you PrivacyBee account. You can access your PrivacyBee dashboard any time to manage your account and customize your privacy policy.', 'privacybee-privacy-policy' ); ?></p>
                    <h4><?php esc_html_e( 'Disable script blocking', 'privacybee-privacy-policy' ); ?></h4>
                    <p><?php esc_html_e( 'PrivacyBee scans your website regulary for new, data protection-relevant scripts. Sometimes the consent banner is blocking these scans. If this is the case, try to solve the issue by enabling this functionality.', 'privacybee-privacy-policy' ); ?>
</p>
                    <div class="drop-sec">
                        <select  id="privacybee_lazyload">
                            <option value="enabled" <?php if( $lazy_load_check == "enabled" ) printf( "selected" ); ?>><?php esc_html_e( 'Enabled', 'privacybee-privacy-policy' ); ?></option>
                            <option value="disabled" <?php if( $lazy_load_check == "disabled" ) printf( "selected" ); ?>><?php esc_html_e( 'Disabled', 'privacybee-privacy-policy' ); ?></option>
                        </select>
                        <a href="https://privacybee.freshdesk.com/support/solutions/articles/103000309618-consent-banner-und-privacybee-integration"><?php esc_html_e( 'Learn more about script blocking', 'privacybee-privacy-policy' ); ?> </a>
                    </div>
                    <h4><?php esc_html_e( 'API Key', 'privacybee-privacy-policy' ); ?></h4>
                    <p><?php esc_html_e( 'Insert your API key to integrate PrivacyBee into this website', 'privacybee-privacy-policy' ); ?></p>
                    <div class="drop-sec">
                        <input type="text" disabled value="<?php printf(esc_attr( get_option('privacybee_api_key') )); ?>">
                        <a href="javascript:void(0)" class="privacybee-disconect"><?php esc_html_e( 'Disconnect account', 'privacybee-privacy-policy' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <form method="post" action="options.php" style="display: none;">
            <?php settings_fields( 'privacybee_settings_group' ); ?>
            <?php do_settings_sections( 'privacybee_settings_group' ); ?>
            <div class="form-group">
                <input type="text" placeholder="Enter your API key" name="privacybee_lazyload"  class="privacybee_lazyload" value="<?php printf(esc_attr( get_option('privacybee_lazyload') )); ?>">
                
            </div>
            <div class="form-group">
                <input type="text" placeholder="Enter your API key" name="privacybee_api_key" class="privacybee_api_keys" value="<?php printf(esc_attr( get_option('privacybee_api_key') )); ?>">
                <input type="submit" name="submit" id="desubmit" class="button button-primary" value="Add API key">
            </div>
        </form>
        
    </div>
    <?php
}
?>