import {unserialize} from 'php-serialize';
import Cookies from 'js-cookie';

export default class GformSponsorUsername {

  constructor(element) {
    this.main(element);
  }

  async main(element) {
    const affid = this.getAffid();
    const response = await this.getUserByAffid(affid);
    const sponsorUsername = await response.data.user_login;
    await this.injectInputValue(element, sponsorUsername);
  }
  
  getAffid() {
    const fallbackAffid = 1
    const uapCookie = Cookies.get('uap_referral');
    const affid = uapCookie ? unserialize(uapCookie).affiliate_id : fallbackAffid;
    return affid;
  }

  async getUserByAffid(affid) {
    const response = await fetch(`/mos-api/user/affid/${affid}`);
    return response.json();
  }

  async injectInputValue(element, string) {
    const input = element.querySelector('input');
    input.value = string;
    return true;
  }
  
}