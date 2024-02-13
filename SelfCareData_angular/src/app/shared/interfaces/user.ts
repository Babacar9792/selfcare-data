import { LibelleId } from "./libelle-id";

export interface User {
    "id": number,
    "nom": string,
    "prenom": string,
    "email": string,
    "departement": LibelleId,
    "login_windows": string,
    "role": string[]
}
