import ICommandHandler from './../ICommandHandler'
import Item from '../../Domain/Entity/Item/Item'
import IItemRepository from '../../Domain/Entity/Item/IItemRepository'
import FetchItemsCommand from './FetchItemsCommand'

export default class FetchItemsCommandHandler implements ICommandHandler<FetchItemsCommand, Promise<Item[]>> {
  private _repository: IItemRepository<Item>

  constructor (repository: IItemRepository<Item>) {
    this._repository = repository
  }

  handle (command: FetchItemsCommand): Promise<Item[]> {
    return this._repository.all()
  }
}
