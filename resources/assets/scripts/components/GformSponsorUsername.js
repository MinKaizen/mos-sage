import {unserialize} from 'php-serialize';
import Cookies from 'js-cookie';

export default class GformSponsorUsername {

  constructor(element) {
    this.main(element);
  }

  async main(element) {
    try {
      const affid = this.getAffid();
      const sponsorUsername = await this.getSponsorUsername(affid);
      await this.injectInputValue(element, sponsorUsername);
    } catch(e) {
      console.warn(e);
    }
  }
  
  getAffid() {
    const cookie = Cookies.get('uap_referral');

    if (!cookie) {
      throw '"uap_referral" cookie not found';
    }

    const affid = unserialize(cookie).affiliate_id;
    return affid;
  }

  async getSponsorUsername(affid) {
    // Fetch sponsor's WP_User object via mos-api
    try {
      const response = await fetch(`/mos-api/user/affid/${affid}`);
      var json_response = await response.json();
    } catch(e) {
      throw `Fetched a non-JSON response from /mos-api/user/affid/${affid}`;
    }

    // Get Username from WP_User object
    try {
      return json_response.data.user_login;
    } catch {
      throw `Could not get WP_User object from affid=${affid}`;
    }
  }

  async injectInputValue(element, string) {
    const input = element.querySelector('input');
    input.value = string;
    return true;
  }
  
}