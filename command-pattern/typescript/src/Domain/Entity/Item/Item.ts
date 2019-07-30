export default class Item {
  private _content: string
  private _id: string

  constructor (id: string, content: string) {
    this._id = id
    this._content = content
  }

  get id (): string {
    return this._id
  }

  get content (): string {
    return this._content
  }
}
