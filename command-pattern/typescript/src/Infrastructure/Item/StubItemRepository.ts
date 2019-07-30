import Item from '../../Domain/Entity/Item/Item'
import IItemRepository from '../../Domain/Entity/Item/IItemRepository'

const data = [
  { id: '1', content: 'Lorem fistrum a gramenawer caballo blanco caballo negroorl' },
  { id: '2', content: 'Condemor a wan fistro tiene musho peligro' },
  { id: '3', content: 'Papaar papaar está la cosa muy malar' },
  { id: '4', content: 'Te va a hasé pupitaa de la pradera' }
]
export default class StubItemRepository implements IItemRepository<Item> {
  all (): Promise<Item[]> {
    const items: Item[] = data.map(item => new Item(item.id, item.content))
    return Promise.resolve(items)
  }
}
