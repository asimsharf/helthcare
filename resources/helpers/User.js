import Token from "./Token";
import AppStorage from "./AppStorage";

class User {
    responseAfterLogin(res) {
        const access_token = res.data.access_token;
        const username = res.data.user;
        if (Token.isValid(access_token)) {
            AppStorage.store(access_token, username);
        }
    }

    hasToken() {
        const storedToken = AppStorage.getToken();
        if (storedToken) {
            return Token.isValid(storedToken) ? true : false;
        }
        return false;
    }

    loggedIn() {
        return this.hasToken();
    }

    logout() {
        AppStorage.clear();
    }

    name() {
        if (this.loggedIn()) {
            return AppStorage.getUser();
        }
    }

    id() {
        if (this.loggedIn()) {
            const payload = Token.payload(AppStorage.getToken());
            return payload.sub;
        }
    }

    own(id) {
        return this.id() == id;
    }

    admin() {
        return this.id() == 1;
    }

    isUser() {
        return this.loggedIn();
    }

    isGuest() {
        return !this.loggedIn();
    }
}

export default User = new User();
